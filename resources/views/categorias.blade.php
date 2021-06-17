@extends('layouts.public')

@section('content')

<?php 
$categorias  = \App\Models\Categorias::get();
?>
<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Productos
    </div>
</div>
<div class="container mb-5">

        <div class="category-list">
            @foreach ($categorias as $item)
            <a  href="{{ route('website.productos.grupo', $item->id) }}" 
                class="category-list__item">
                <div class="category-list__overlay"></div>
                <div class="category-list__container"  style="
                background-image: url({{ $item->image }});
                height: 300px;
                ">
                   
                </div>
                
                <div class="category-list__title"> {{ $item->title }} </div>
            </a>
            @endforeach
        </div>
    </div>


@endsection