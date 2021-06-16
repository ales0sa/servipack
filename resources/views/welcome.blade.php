@extends('layouts.public')

@section('content')
    <?php 

      $home = \App\Models\Home::find(1);
      
      $categorias  = \App\Models\Categorias::get();
      $starreds    = \App\Models\Productos::where('onhome', 1)->get();
      $clientes    = \App\Models\Clientes::pluck('image');
      ?>
    @include('components.carousel', ['data' => \App\Models\SlidersHome::get()])
    <div class="row-fluid" style="background: #00AFEF; height: 110px;">
    </div>

    <div class="container mb-5">
        <h3 class="block-title mb-2 mt-2">NUESTRAS CATEGORÍAS</h3>
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

    <div class="home__promo">
        <div class="container">
            <div class="row">
                
                <div class="col-md-8 home__promo-right">
                    <div class="home__promo-text1">
                    {{ $home->input_1 }}
                        
                    </div>
                    <div class="home__promo-text2">
                    {{ $home->input_2 }}
                    </div>
                    <div class="home__promo-text3">
                    {{ $home->input_3 }}
                    </div>
                </div>
                <div class="col-md-4"  style=" 
                        background-image:url({{ $home->promo_image }});
                        background-size:cover;
                        background-repeat:no-repeat;
                        height:396px;
                        background-position:center;
                        ">
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mb-5">
        <h3 class="block-title mb-2 mt-2">PRODUCTOS DESTACADOS</h3>
        <div class="product-list" >
            @foreach ($starreds as $item)
            <a  href="{{ route('website.producto', $item->id) }}" 
                class="product-list__item">
                <div class="product-list__overlay"></div>
                <div class="product-list__container"  style="
                background-image: url({{ $item->image }});
                height: 250px;
                ">
                   
                </div>
                
                <div class="product-list__title"> {{ $item->name }} </div>
            </a>
            @endforeach
        </div>
    </div>

    <div class="home__marcas">
        <div class="container">       

            <slick  images="{{ json_encode($clientes) }}"/>
        </div>
    </div>
@endsection