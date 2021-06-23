@extends('layouts.public')

@section('content')
<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-user"></i> 



    </div>
</div>
<div class="container mb-5">
<div class="row mt-4">

    @if(Auth::check())

        Bienvenido, {{ Auth::user()->name }}
    @else

        <regandlog />

    @endif

</div>

</div>

@endsection