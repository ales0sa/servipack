@extends('layouts.public')

@section('content')
<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Tu carrito
    </div>
</div>
<div class="container mb-5">
<div class="row mt-4">

    @auth
        <checkout />
    @endauth

    @guest

        Porfavor, registrate o inicia sesión para continuar para continuar.


        <regandlog />

    @endguest
</div>

</div>

@endsection