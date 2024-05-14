<?php

namespace App\Livewire;

use App\Models\Show;
use Livewire\Component;
use Livewire\WithPagination;

class ListShows extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.list-shows', [
            'shows' => Show::paginate(25)
        ])->title('List shows');
    }
}
