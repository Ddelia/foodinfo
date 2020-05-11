<?php

namespace App\Http\Controllers;

use App\FoodData;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('importExcel.index');
    }

    public function store(Request $request)
    {
        $extenstions = ['xls', 'xlsx', 'csv'];

        $extension = $request->file('importedFile')->getClientOriginalExtension();

        $validatedData = $request->validate([
            'importedFile' => 'required',
        ]);

        if($validatedData && in_array($extension, $extenstions))
        {
            ini_set('max_execution_time', 600);
            ini_set('memory_limit', '2048M');
//            ini_set('post_max_size', '2048M');
//            ini_set('upload_max_filesize', '2048M');

            Excel::import(new DataImport(), $request->file('importedFile'));

            session()->flash('uploaded', 'The data has been uploaded.');
            return redirect()->back();
        }

        return redirect()->back()
            ->withErrors($validatedData)
            ->withInput();
    }
}
