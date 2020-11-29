<?php

namespace App\Imports;

use App\CourierPrice;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class CourierPriceImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        
        $index = 0;
        $weight = 1;
        foreach ($rows as $row) 
        {
            
            if($index > 2){
                
                CourierPrice::updateOrCreate(
                    ["courier_id" => $this->courier_id, "weight_id" => $weight, "zone_id" => 1],
                    ["account" => $row[1], "courier_price" => floatval($row[2]), "shipal_price" => floatval($row[3])]
                );

                CourierPrice::updateOrCreate(
                    ["courier_id" => $this->courier_id, "weight_id" => $weight, "zone_id" => 2],
                    ["account" => $row[4], "courier_price" => floatval($row[5]), "shipal_price" => floatval($row[6])]
                );

                CourierPrice::updateOrCreate(
                    ["courier_id" => $this->courier_id, "weight_id" => $weight, "zone_id" => 3],
                    ["account" => $row[7], "courier_price" => floatval($row[8]), "shipal_price" => floatval($row[9])]
                );

                CourierPrice::updateOrCreate(
                    ["courier_id" => $this->courier_id, "weight_id" => $weight, "zone_id" => 4],
                    ["account" => $row[10], "courier_price" => floatval($row[11]), "shipal_price" => floatval($row[12])]
                );

                CourierPrice::updateOrCreate(
                    ["courier_id" => $this->courier_id, "weight_id" => $weight, "zone_id" => 5],
                    ["account" => $row[13], "courier_price" => floatval($row[14]), "shipal_price" => floatval($row[15])]
                );

                CourierPrice::updateOrCreate(
                    ["courier_id" => $this->courier_id, "weight_id" => $weight, "zone_id" => 6],
                    ["account" => $row[16], "courier_price" => floatval($row[17]), "shipal_price" => floatval($row[18])]
                );

                CourierPrice::updateOrCreate(
                    ["courier_id" => $this->courier_id, "weight_id" => $weight, "zone_id" => 7],
                    ["account" => $row[19], "courier_price" => floatval($row[20]), "shipal_price" => floatval($row[21])]
                );

                CourierPrice::updateOrCreate(
                    ["courier_id" => $this->courier_id, "weight_id" => $weight, "zone_id" => 8],
                    ["account" => $row[22], "courier_price" => floatval($row[23]), "shipal_price" => floatval($row[24])]
                );

                $weight++;

            }
            
            $index++;
        }

    }

    public function  __construct($courier_id)
    {
        $this->courier_id= $courier_id;
    }

}
