@extends('layouts.app')

@section('content')
    <style>
        .chat-main {
            height: 20rem;
            overflow-y: auto;
            padding: 1rem;
        }

        .chat-input {
            position: relative;
            margin-top: 1rem;
        }

        .message {
            padding: 0.5rem;
            border-radius: 5px;
            margin-bottom: 0.5rem;
        }

        .message.admin {
            background-color: #E6381A;
            color: #fff;
            text-align: left;
        }

        .message.user {
            background-color: #5F61E6;
            text-align: right;
            color: #fff;
        }
    </style>

    <div class="container mt-5">
        <div class="row">
            <!-- If the logged-in user is an admin, show the list of users -->
            @if (Auth::user()->role === 'admin')
                <div class="col-md-4 col-12 mb-md-0 mb-4">
                    <div class="card">
                        <h5 class="card-header">All Users</h5>
                        <div class="card-body">
                            @foreach($users as $user)
                                <a href="{{ route('sport.user.chat', $user->id) }}" class="text-white">
                                    <div class="card bg-primary mb-2">
                                        <div class="card-body text-white d-flex justify-content-between">
                                            <div class="card-left">
                                                Name: {{ $user->name }}
                                            </div>
                                            <div class="card-right">
                                                @if($user->unread_messages_count > 0)
                                                    <span class="badge badge-center rounded-pill bg-warning">
                                                        {{ $user->unread_messages_count }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Chat column for both admin and users -->
            <div class="{{ Auth::user()->role === 'admin' ? 'col-md-8 col-12' : 'col-md-12 col-12' }}">
                <div class="card">
                    <h5 class="card-header">
                        {{ isset($user) ? "Chat with {$user->name}" : (Auth::user()->role === 'admin' ? 'Admin Chat' : 'User Chat') }}
                    </h5>
                    <div class="card-body">
                        <div class="chat-main">
                            <!-- Display chat messages -->
                            @foreach ($messages as $message)
                                <div class="message {{ $message->user_id === Auth::id() ? 'user' : 'admin' }}">
                                    {{ $message->message }}
                                    <small class="d-block text-muted">{{ $message->created_at->format('M d, Y h:i A') }}</small> <!-- Show the date below each message -->
                                </div>
                            @endforeach
                        </div>

                        <!-- Chat input form -->
                        <form action="{{ isset($user) ? route('message.store', $user->id) : route('message.store') }}" method="POST">
                            @csrf
                            <div class="chat-input d-flex">
                                <input type="text" name="message" class="form-control shadow-none" placeholder="Type your message..." required>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
