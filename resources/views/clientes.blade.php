@extends('layouts.public')

@section('content')
<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Clientes
    </div>
</div>

<div class="container mt-5 mb-5">

    <div class="row">

        @foreach($data as $item)

            <div class="col-md-2 mx-auto" style="background: transparent url('img/Rectángulo 2515.png') 0% 0% no-repeat padding-box;
box-shadow: 4px 3px 6px #00000029;
border: 1px solid #F2F2F2; padding: 10px;
border-radius: 12px; min-height: 159px; background-image: url({{ $item->image }});
background-size: contain; background-position: center;">

               

            </div>

        @endforeach

    </div>

</div>

@endsection