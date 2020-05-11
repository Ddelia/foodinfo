<?php

namespace App\Imports;

use App\FoodData;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Row;

class DataImport implements WithChunkReading, OnEachRow, WithStartRow
{
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        FoodData::create([
            'name' => $row[1],
            'food_group' => $row[2],
            'calories' => $row[3],
            'fat'=> $row[4],
            'carbs' => $row[6],
            'net_carbs' => $row[22],
            'sugars' => $row[7],
            'fiber'=> $row[8],
        ]);
    }

    public function chunkSize(): int
    {
        return 800;
    }

    public function startRow(): int
    {
        return 2;
    }

//    public function model(array $row)
//    {
//        //dd($row);
//        $insert_data = [
//            'name' => $row[1],
//            'food_group' => $row[2],
//            'calories' => $row[3],
//            'fat'=> $row[4],
//            'carbs' => $row[6],
//            'net_carbs' => $row[22],
//            'sugars' => $row[7],
//            'fiber'=> $row[8],
//        ];
//
//        //dd($insert_data);
//        $data = new FoodData([$insert_data]);
//        return $data;
//    }

//    public function batchSize(): int
//    {
//        return 800;
//    }
}
