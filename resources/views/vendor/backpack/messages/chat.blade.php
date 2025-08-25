@extends(backpack_view('blank'))

@section('content')
<div class="container mt-3">
    <h2>Admin Communication</h2>

    <div class="card">
        <div class="card-body">

            @foreach($messages as $msg)
            <div class="mb-3 p-3 border rounded bg-light">
                <strong>{{ $msg->user->name }}</strong>
                <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                <p>{{ $msg->message }}</p>

                <!-- Replies -->
                @foreach($msg->replies as $reply)
                <div class="ml-4 p-2 border-left rounded bg-white">
                    <strong>{{ $reply->user->name }}</strong>
                    <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                    <p>{{ $reply->message }}</p>
                </div>
                @endforeach

                <!-- Reply Form -->
                <form action="{{ backpack_url('message') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="reply_to" value="{{ $msg->id }}">
                    <input type="hidden" name="user_id" value="{{ backpack_user()->id }}">
                    <textarea name="message" class="form-control mb-1" placeholder="Write a reply..." required></textarea>
                    <button class="btn btn-sm btn-primary">Reply</button>
                </form>
            </div>
            @endforeach

            <!-- New Message Form -->
            <div class="mt-4">
                <h5>New Message</h5>
                <form action="{{ backpack_url('message') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ backpack_user()->id }}">
                    <textarea name="message" class="form-control mb-1" placeholder="Write a message..." required></textarea>
                    <button class="btn btn-success">Send</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
