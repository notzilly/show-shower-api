<div>
    <form wire:submit="preview">
        <label for="file-picker">Choose a show file:</label>

        <input type="file" id="file-picker" wire:model="file" accept=".txt, .csv" required/>
        <input type="submit" value="Preview">
    </form>


    @if (!empty($shows))
        <button wire:click="clear">Reset</button>
        <button wire:click="save">Save</button>
        <table>
        {{-- @if (!empty($headingRow)) --}}
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Release Year</th>
                    {{-- @foreach ($headingRow as $headingColumn)
                        <th>{{ $headingColumn }}</th>
                    @endforeach --}}
                </tr>
            </thead>
        {{-- @endif --}}
            <tbody>
                @foreach ($shows as $show)
                <tr>
                    <td>{{ $show['title'] }}</td>
                    <td>{{ $show['description'] }}</td>
                    <td>{{ $show['release_year'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
