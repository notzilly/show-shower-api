<div id="container">
    <h3>{{ $show->title }} ({{ $show->release_year }})</h3>
    <p>{{ $show->description }}</p>
    @if (!empty($show->imdb_id))
        <p class="imdb-link">
            <a href="https://www.imdb.com/title/{{ $show->imdb_id }}">IMDB ref</a>
        </p>
    @endif
</div>
