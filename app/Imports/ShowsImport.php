<?php

namespace App\Imports;

use App\Models\Show;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShowsImport implements ToModel, ToArray, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Show([
            'title' => $row['title'],
            'description' => $row['description'],
            'release_year' => $row['release_year'],
        ]);
    }

    public function array(array $row)
    {
        return [
            'title' => $row['title'],
            'description' => $row['description'],
            'release_year' => $row['release_year'],
        ];
    }

    public function headingRow(): int
    {
        return 1;
    }
}
