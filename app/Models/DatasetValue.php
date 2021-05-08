<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatasetValue extends Model
{
    protected $fillable = ['datasetExplanation_id', 'sample_time', 'sample_temperature'];

    public function datasetExplanation()
    {
        return $this->belongsTo(DatasetExplanation::class);
    }
}
