<?php

namespace App\Http\Controllers\User_Area;

use App\Http\Controllers\Controller;
use App\Models\DatasetExplanation;
use Illuminate\Http\Request;
use App\Http\Requests\DatasetExplanationRequest;
use App\Services\calculation;
use App\Models\DatasetValue;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
    public function store(DatasetExplanationRequest $request)
    {

        $Validate_data = $request->validated();
        $file = $Validate_data['dataset_file'];
        $fileExtension = $request->file('dataset_file')->getClientOriginalExtension();
        $newFileName = now()->timestamp . '_' . $file->getClientOriginalName();
        $file->move(public_path('Uploaded_Files\\'), $newFileName);
        $file_path = public_path('Uploaded_Files\\') . $newFileName;


        return redirect('/user_area/datasets');
    }
}
