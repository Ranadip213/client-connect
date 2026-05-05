@extends('admin.admin_master')
@section('admin')

<div class="container-fluid px-4 mt-4">

    <h4>Chat with {{ $order->user->name }}</h4>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-body">

            {{-- Chat Box --}}
            <div id="chatBox" style="height: 350px; overflow-y: auto; border:1px solid #ddd; padding:15px;">

                @forelse($order->messages as $msg)

                    @if($msg->sender_id == auth()->id())
                        {{-- Admin Message --}}
                        <div class="text-end mb-2">
                            <span class="badge bg-primary">
                                {{ $msg->message }}
                            </span>
                            <br>
                            <small class="text-muted">You</small>
                        </div>
                    @else
                        {{-- User Message --}}
                        <div class="text-start mb-2">
                            <span class="badge bg-secondary">
                                {{ $msg->message }}
                            </span>
                            <br>
                            <small class="text-muted">{{ $msg->user->name }}</small>
                        </div>
                    @endif

                @empty
                    <p class="text-center text-muted">No messages yet</p>
                @endforelse

            </div>

            {{-- Send Message --}}
            <form method="POST" action="{{ route('send.message') }}" class="mt-3">
                @csrf

                <input type="hidden" name="order_id" value="{{ $order->id }}">

                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Type your message..." required>
                    <button class="btn btn-success">Send</button>
                </div>

            </form>

        </div>
    </div>

</div>

{{-- Auto Scroll --}}
<script>
    let chatBox = document.getElementById("chatBox");
    chatBox.scrollTop = chatBox.scrollHeight;
</script>

@endsection