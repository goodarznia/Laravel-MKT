<?php

namespace App\Http\Controllers\User_Area;

use App\Http\Controllers\Controller;
use App\Models\DatasetExplanation;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    //This function use for show list of Datasets.
    public function index()
    {
        return view('dataset.list', [
            'datasets' => DatasetExplanation::where('user_id', auth()->user()->id)->get()
        ]);
    }

    //This function use for show import form list by import view.
    public function create()
    {
        return view('dataset.import');
    }

}
