@extends('layouts.app')
@section('content')
<style>
    .chat-main {
        height: 20rem;
        overflow-y: auto;
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
        @if(Auth::user()->role !== 'user')
            <div class="col-md-4 col-12 mb-md-0 mb-4">
                <div class="card">
                    <h5 class="card-header">All Users</h5>
                    <div class="card-body">
                        <div class="card bg-primary">
                            <div class="card-body text-white d-flex justify-content-between">
                                <div class="card-left">
                                    Name: User
                                </div>
                                <div class="card-right">
                                    <span class="badge badge-center rounded-pill bg-warning">1</span>
                                </div>
                            </div>
                        </div>
                        <!-- Add more users here -->
                    </div>
                </div>
            </div>
        @endif

        <div class="{{ Auth::user()->role === 'user' ? 'col-md-12 col-12' : 'col-md-8 col-12' }}">
            <div class="card">
                <h5 class="card-header">Chat</h5>
                <div class="card-body">
                    <div class="chat-main">
                        <!-- Chat messages will be dynamically loaded here -->
                        <div class="message user">
                            Hello! How can I help you?
                        </div>
                        <div class="message admin">
                            I have a question about my order.
                        </div>
                    </div>
                    <div class="chat-input d-flex">
                        <input type="text" class="form-control  shadow-none" placeholder="Type your message...">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
