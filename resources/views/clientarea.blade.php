@extends('layouts.public')

@section('content')
<div class="row-fluid breadcrumbs">
    <div class="container">

        



    </div>
</div>
<div class="container mt-5 mb-5">
<div class="row mt-4">


@if(Auth::check())


<checkout />

@else

<regandlog />

@endif

    <!-- @if(Auth::check())

<div class="container">
        <h3>Bienvenido, {{ Auth::user()->name }} !</h3>

        <div class="d-flex flex-column bd-highlight mt-5 mb-3">
            <button type="button" class="btn btn-primary">CONTINUAR A MI CARRITO</button>

        </div>

        <div class="d-flex flex-column bd-highlight mb-3">

            <button type="button" class="btn btn-primary">HISTORIAL DE ORDENES</button>

        </div>

        <div class="d-flex flex-column bd-highlight mb-5">

            <button type="button" class="btn btn-primary">CERRAR SESIÓN</button>
        </div> 
        
        </div>
    @else

        <regandlog />

    @endif

</div> -->

</div>

@endsection