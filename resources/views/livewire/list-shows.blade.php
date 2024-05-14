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
