<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class FoodData extends Model
{
    use Searchable;

    protected $table = 'food_data';

    protected $fillable = ['name', 'food_group', 'calories', 'fat', 'carbs', 'net_carbs', 'sugars', 'fiber'];

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return [
            'name' => $array['name'],
            'food_group' => $array['food_group'],
            'calories' => $array['calories'],
            'fat' => $array['fat'],
            'carbs' => $array['carbs'],
            'net_carbs' => $array['net_carbs'],
            'sugars' => $array['sugars'],
            'fiber' => $array['fiber'],
        ];
    }
}
