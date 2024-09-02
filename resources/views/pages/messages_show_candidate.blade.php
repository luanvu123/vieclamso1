<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Messages' }}</title>
    <style>
        /* styles.css */

/* Reset mặc định của trình duyệt */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f8f9fa;
    color: #333;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

header {
    background: #007bff;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    margin: 0;
}

main {
    margin-top: 20px;
}

.card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 20px;
}

.media {
    display: flex;
    align-items: center;
}

.media img {
    border-radius: 50%;
}

.media-body {
    flex: 1;
}

.text-left {
    text-align: left;
}

.text-right {
    text-align: right;
}

.mb-3 {
    margin-bottom: 1rem;
}

.mt-0 {
    margin-top: 0;
}

.form-group {
    margin-bottom: 1rem;
}

.form-control {
    width: 100%;
    padding: 0.375rem 0.75rem;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
}

.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    border-radius: 0.25rem;
    text-decoration: none;
}

.btn-primary {
    background-color: #19a714;
    border-color: #17c646;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

footer {
    background: #f1f1f1;
    padding: 10px 0;
    text-align: center;
    margin-top: 20px;
}

footer p {
    margin: 0;
}

    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>{{ $header ?? 'Messages' }}</h1>
        </header>

        <main>


            <h2 class="mb-4">Tin nhắn với {{ $employer->company->name }}</h2>
            <div class="card">
                <div class="card-body">
                    @foreach ($messages as $message)
                        <div class="media mb-3 {{ $message->sender_type == 'candidate' ? 'text-left' : 'text-right' }}">
                            @if ($message->sender_type == 'candidate')
                                <img src="{{ $message->candidate->avatar_candidate ? asset('storage/' . $message->candidate->avatar_candidate) : asset('storage/avatar/avatar-default.jpg') }}"
                                    class="mr-3 rounded-circle" alt="Avatar" style="width: 50px; height: 50px;">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $message->candidate->fullname_candidate }}</h5>
                                    <p>{{ $message->message }}</p>
                                    <small class="text-muted">Sent at:
                                        {{ $message->created_at->format('d-m-Y H:i A') }}</small>
                                </div>
                            @else
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $message->employer->company->name }}</h5>
                                    <p>{{ $message->message }}</p>
                                    <small class="text-muted">Sent at:
                                        {{ $message->created_at->format('d-m-Y H:i A') }}</small>
                                </div>
                                <img src="{{ $message->employer->company->logo ? asset('storage/' . $message->employer->company->logo) : asset('storage/avatar/avatar-default.jpg') }}"
                                    class="ml-3 rounded-circle" alt="Avatar" style="width: 50px; height: 50px;">
                            @endif
                        </div>
                        <hr>
                    @endforeach
                    <form action="{{ route('messages.reply.candidate', $employer) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message">Reply</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Vieclamso1</p>
        </footer>
    </div>
</body>

</html>
