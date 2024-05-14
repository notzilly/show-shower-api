<?php

namespace App\Livewire;

use App\Models\Show;
use Livewire\Component;

class ShowShows extends Component
{
    public Show $show;

    public function mount($id)
    {
        $this->show = Show::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.show-shows')
            ->title(
                sprintf('%s (%d)', $this->show->title,  $this->show->release_year)
            );
    }
}
