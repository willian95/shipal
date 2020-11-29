<?php

namespace App\Imports;

use App\Country;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class ZoneImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $index = 0;
        foreach ($rows as $row) 
        {
            
            if($index > 2){
                
                //Log::info($row[2]);
                Country::updateOrCreate(
                    ["name" => $row[1]],
                    ["zone_id" => $row[2]]
                );

            }
            
            $index++;
        }

    }
}
