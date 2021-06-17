@extends('layouts.public')

@section('content')


@include('components.carousel', ['data' => \App\Models\SlidersEmpresa::get()])
<div class="container mt-5">

    <div class="row">
        <div class="col-6">

            <h6>{{ $data->input_1 }}</h6>
            <p>{!! $data->input_2 !!}</p>

        </div>
        <div class="col-6">
            <img src="{{ $data->input_5 }}" />
        </div>
    </div>
    <div class="row">
        <div class="col-6">

            <h6>{{ $data->input_3 }}</h6>
            <p>{!! $data->input_4 !!}</p>

        </div>
        <div class="col-6">
            <img src="{{ $data->input_6 }}" />
        </div>
    </div>

</div>


@endsection