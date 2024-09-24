<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\User;
use Auth;

class SportController extends Controller
{
    
    // Display the chat view
    public function index()
    {
        // Fetch all users if the logged-in user is an admin
        $users = [];
        if (Auth::user()->role === 'admin') {
            // Fetch all users and their unread message count
            $users = User::withCount(['messages as unread_messages_count' => function ($query) {
                $query->whereNull('read_at');  // Only count unread messages
            }])->get();  // Admin can view all users
        }

        // Fetch messages between the logged-in user and the admin (or all messages if admin)
        $messages = Sport::query()
            ->when(Auth::user()->role === 'user', function ($query) {
                // Regular user sees their messages with the admin (assuming admin has id = 1)
                return $query->where(function($q) {
                    $q->where('user_id', Auth::id())
                      ->where('recipient_id', 1);  // Messages sent to admin
                })->orWhere(function($q) {
                    $q->where('user_id', 1)       // Admin's responses
                      ->where('recipient_id', Auth::id());
                });
            })
            ->orderBy('created_at', 'asc')  // Order messages by date (ascending)
            ->get();

        return view('sport.index', compact('messages', 'users'));
    }

    // Show a specific user's chat (only for admins)
    public function showUserChat(User $user)
    {
        // Mark all unread messages from this user as read
        Sport::where('user_id', $user->id)
            ->where('recipient_id', 1)  // Admin is the recipient
            ->whereNull('read_at')  // Only unread messages
            ->update(['read_at' => now()]);  // Mark as read

        // Fetch all users for the admin view
        $users = User::withCount(['messages as unread_messages_count' => function ($query) {
            $query->whereNull('read_at');  // Only count unread messages
        }])->get();

        // Fetch the messages between the admin and this user
        $messages = Sport::where(function ($query) use ($user) {
            $query->where('user_id', $user->id)  // Messages from the user to the admin
                  ->where('recipient_id', 1);
        })->orWhere(function ($query) use ($user) {
            $query->where('user_id', 1)  // Messages from the admin to the user
                  ->where('recipient_id', $user->id);
        })
        ->orderBy('created_at', 'asc')  // Order messages by date (ascending)
        ->get();

        return view('sport.index', compact('messages', 'users', 'user'));
    }

    // Store a new message
    public function storeMessage(Request $request, $userId = null)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        if (Auth::user()->role === 'admin' && $userId) {
            // Admin sending a message to a specific user
            Sport::create([
                'user_id' => Auth::id(),  // Admin's ID (sender)
                'recipient_id' => $userId,  // The ID of the user who receives the message
                'message' => $request->message,
            ]);

            return redirect()->route('sport.user.chat', $userId);
        } else {
            // Regular user sending a message to the admin
            Sport::create([
                'user_id' => Auth::id(),  // The user's ID (sender)
                'recipient_id' => 1,  // Admin's ID (recipient)
                'message' => $request->message,
            ]);

            return redirect()->route('sport.index');
        }
    }
}
