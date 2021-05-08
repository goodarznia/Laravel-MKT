<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatasetExplanation extends Model
{
    protected $fillable = ['title', 'activation_energy', 'MKT', 'comment', 'user_id', 'user_ip'];

    public function datasetValues()
    {
        return $this->hasMany(DatasetValue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
