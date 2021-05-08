@extends('layouts.master')
@section('page_title','Add New Dataset')

@section('content')
    <form class="form-horizontal" action="../datasets" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>
        @endif
        <div class="form-group">
            <label class="text-danger">* </label>
            <label class="control-label" for="Title">Title of dataset:</label>
            <div class="col-sm-10">
                <input name="Title" type="text" class="form-control" id="Title"
                       placeholder="Please enter the title of dataset">
            </div>
        </div>

        <div class="form-group">
            <label class="text-danger">* </label>
            <label class="control-label" for="Activation Energy">Activation Energy: (kJ per mol)</label>
            <div class="col-sm-10">
                <input name="Activation_Energy" type="text" class="form-control" id="Activation_Energy" value="83.144"
                       placeholder="Enter a valid Activation Energy value">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label" for="Comments"> Comments:</label>
            <div class="col-sm-10">
                <textarea name="Comment" class="form-control" id="Comments"
                          placeholder="You can add an optional comments"></textarea>

            </div>
        </div>

        <div class="form-group">
            <label class="text-danger">* </label>
            <label class="control-label" for="Gas constant">Choose dataset file: (JSON)</label>
            <div class="col-sm-10">
                <input name="dataset_file" type="file" class="form-control" id="dataset_file">
            </div>
        </div>

        <div class="form-group">
            <label class="text-danger">Fields marked with * are required</label>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>

        <br><br>
    </form>

@endsection

