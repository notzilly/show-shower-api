<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($providers = [])
    {
        $records = [];

        foreach ($providers as $provider) {
            $csv = Reader::createFromPath(Storage::path("db_data/$provider/titles.csv"), 'r');
            $csv->setHeaderOffset(0);
    
            $records = array_merge(iterator_to_array($csv->getRecords()), $records);
        }

        Log::info('Prepared # of records to insert in shows table: ' . count($records));

        $inserted = 0;

        DB::transaction(function() use ($records, &$inserted)
        {
            $offset = 1;
            $thousandRecs = array_slice($records, $offset, 1000, true);
            $now = Carbon::now();

            while(count($thousandRecs) > 0)
            {
                foreach($thousandRecs as $index => $record)
                {
                    $thousandRecs[$index]['created_at'] = $now;
                }
                $inserted += DB::table('shows')->insertOrIgnore($thousandRecs);
                
                $offset += 1000;
                $thousandRecs = array_slice($records, $offset, 1000, true);
            }
        });
        
        Log::info('Inserted # of records in shows table: ' . $inserted);
    }
}
