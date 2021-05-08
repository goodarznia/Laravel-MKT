@extends('layouts.master')
@section('page_title','Mean Kinetic Temperature Calculation')

@section('content')
    <div class="card mb-4">
        <img class="card-img-top" src="{{ asset('images/MKT.png') }}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">Mean Kinetic Temperature</h2>
            <p class="card-text text-justify">Regulatory bodies and stakeholder organizations in drug and device
                manufacturing and distribution have long been working toward creating standards for temperature
                monitoring that ensure the shelf life, quality and safety of products.</p>
            <p class="card-text text-justify">In the last 15 years of these ongoing efforts, mean kinetic temperature
                (MKT) has been identified as one of the potential tools available for evaluating the impact of
                temperature on product quality.</p>
            <a href="https://nordiclifescience.org/vaisala/2017/11/01/mean-kinetic-temperature-gxp-environments/"
               target="_blank" class="btn btn-primary">Read More &rarr;</a>
        </div>
    </div>
@endsection
