<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shows</title>

    @include('normal-style-and-font')
    @include('style')
</head>
<body>
    <div id="container">
        {{ $shows->links() }}
        @foreach ($shows as $show)
            <a href="{{ url()->current() }}/{{ $show->id }}">
                <h3>{{ $show->title }} ({{ $show->release_year }})</h3>
            </a>
            <p>{{ $show->description }}</p>
        @endforeach
        {{ $shows->links() }}
    </div>
</body>
</html>
