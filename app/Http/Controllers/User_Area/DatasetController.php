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
    //This function use for Store data from import form list
    public function store(DatasetExplanationRequest $request)
    {

        $Validate_data = $request->validated();
        $file = $Validate_data['dataset_file'];
        $fileExtension = $request->file('dataset_file')->getClientOriginalExtension();
        $newFileName = now()->timestamp . '_' . $file->getClientOriginalName();
        $file->move(public_path('Uploaded_Files\\'), $newFileName);
        $file_path = public_path('Uploaded_Files\\') . $newFileName;
        $datasets = json_decode(file_get_contents($file_path));
        // Insert data in Data Explanation Table
        $datasetExplanation_id = DatasetExplanation::insertGetId([
            'title' => $Validate_data['Title'],
            'activation_energy' => $Validate_data['Activation_Energy'],
            'MKT' => calculation::calcMKT($Validate_data['Activation_Energy'], $datasets),
            'comment' => $Validate_data['Comment'],
            'user_id' => auth()->user()->id,
            'user_ip' => request()->ip(),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        // Insert data in Dataset Value Table
        foreach ($datasets as $ds) {

            DatasetValue::create([
                'datasetExplanation_id' => $datasetExplanation_id,
                'sample_time' => $ds->Time,
                'sample_temperature' => $ds->Temperature
            ]);

        }
        //Delete stored file for optimizing storage space
        File::delete($file_path);

        alert()->success('The dataset stored in Database properly', 'Congratulation')->persistent('OK');
        return redirect('/user_area/datasets');
    }
    //This function use for show dataset details by data view.
    public function show(DatasetExplanation $dataset)
    {
        return view('dataset.data', ['dataset' => $dataset,
            'dataRecords' => DatasetValue::where('datasetExplanation_id', $dataset->id)->get(),
        ]);
    }
}
