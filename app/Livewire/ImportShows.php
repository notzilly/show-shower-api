<?php

namespace App\Livewire;

use App\Imports\ShowsImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportShows extends Component
{
    use WithFileUploads;

    public $file = null;

    public $headingRow = [];
    public $shows = [];

    public function preview()
    {
        // try catch huh?
        // $this->headingRow = (new HeadingRowImport)->toArray($this->file)[0];
        $this->shows = Excel::toArray(new ShowsImport, $this->file)[0];


    }

    public function clear()
    {
        $this->reset('headingRow', 'shows');
    }

    public function save()
    {
        $this->reset('headingRow', 'shows');
    }

    public function render()
    {
        return view('livewire.import-shows')
            ->title('Import Shows');
    }
}
