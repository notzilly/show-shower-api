<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use League\Csv\Statement;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(Storage::path('db_data/netflix/titles.csv'), 'r');
        $csv->setHeaderOffset(0);

        $stmt = Statement::create()->limit(10);

        $records = ($stmt->process($csv));
        foreach($records as $record) {
            dd($record);
        }
        // DB::table('shows')->
    }
}
