<?php

namespace App\Imports;

use App\TypePackaging;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class TypePackageImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $index = 0;
        foreach ($rows as $row) 
        {

            if($index > 0){

                TypePackaging::updateOrCreate(
                    ["courier_id" => $this->courier_id, "name" => $row[0]],
                    ["width" => $row[1], "height" => $row[2], "length" => $row[3], "weight" => $row[4]]
                );

            }

            $index++;
        }
    }

    public function  __construct($courier_id)
    {
        $this->courier_id= $courier_id;
    }

}
