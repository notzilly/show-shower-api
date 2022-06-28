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
    public function run()
    {
        $csv = Reader::createFromPath(Storage::path('db_data/netflix/titles.csv'), 'r');
        $csv->setHeaderOffset(0);

        $records = iterator_to_array($csv->getRecords());

        Log::debug('total # of records: ' . count($records));

        DB::transaction(function() use ($records)
        {
            $offset = 1;
            $thousandRecs = array_slice($records, $offset, 1000, true);
            $now = Carbon::now();

            while(count($thousandRecs) > 0)
            {
                foreach($thousandRecs as $index => $record)
                {
                    $thousandRecs[$index]['ext_id'] = $record['id'];
                    $thousandRecs[$index]['created_at'] = $now;
                    unset($thousandRecs[$index]['id']);
                }
                Log::debug('# in array: ' . count($thousandRecs));
                Log::debug('# of inserts: ' . DB::table('shows')->insertOrIgnore($thousandRecs));

                $offset += 1000;
                $thousandRecs = array_slice($records, $offset, 1000, true);
                Log::debug('# in array after loop: ' . count($thousandRecs));
            }
        });
    }
}
