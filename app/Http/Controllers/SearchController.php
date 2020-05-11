<?php

namespace App\Http\Controllers;

use App\FoodData;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //$food_data = null;

        if($request->has('full_text_search')) {
            $food_data = FoodData::search($request->input('full_text_search'))->get();
        }
        else
        {
            $food_data = FoodData::all();
        }

        return view('search.index', compact('food_data'));
    }

    public function store(Request $request)
    {

    }
}
