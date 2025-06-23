<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
</head>
<body>
    <h1>All Posts</h1>

    @if (count($posts) === 0)
        <p>No posts found.</p>
    @else
        <ul>
            @foreach ($posts as $post)
                <li style="margin-bottom: 1.5em; padding-bottom: 1em; border-bottom: 1px solid #ccc;">
                    <strong>{{ $post['title'] }}</strong><br>
                    {{ $post['content'] }}<br>
                    <small>
                        By <strong>{{ $post['author'] }}</strong> 
                        on {{ \Carbon\Carbon::parse($post['created_at'])->format('F j, Y g:i A') }}
                    </small>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
