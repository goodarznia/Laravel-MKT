<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataset_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('datasetExplanation_id');
            $table->foreign('datasetExplanation_id')->references('id')->on('dataset_explanations')->onDelete('cascade');
            $table->dateTime('sample_time');
            $table->double('sample_temperature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dataset_values');
    }
}
