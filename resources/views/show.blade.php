<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $show->title }} ({{ $show->release_year }})</title>

    @include('normal-style-and-font')
    @include('style')
</head>
<body>
    <div id="container">
        <h3>{{ $show->title }} ({{ $show->release_year }})</h3>
        <p>{{ $show->description }}</p>
        @if (!empty($show->imdb_id))
            <p class="imdb-link">
                <a href="https://www.imdb.com/title/{{ $show->imdb_id }}">IMDB ref</a>
            </p>
        @endif
    </div>
</body>
</html>
