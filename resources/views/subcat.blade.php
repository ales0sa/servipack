@extends('layouts.public')

@section('content')
<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Productos / {{ $sc }}
    </div>
</div>
<div class="container mb-5">
<div class="row mt-4">

<div class="col-md-4 col-lg-4">

    <div class="accordion  accordion-flush" id="accordionExample">
        @foreach($categorias as $cat)

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button @if($cat->id == $subcat->category_id)  @else collapsed @endif " 
                type="button" data-bs-toggle="collapse" 
                data-bs-target="#collapse{{ $cat->id }}" 
                aria-expanded="@if($cat->id == $subcat->category_id) true @else false @endif " 
                aria-controls="collapse{{ $cat->id }}">
                {{ $cat->title }}
                </button>
                </h2>
                <div id="collapse{{ $cat->id }}" 
                    class="accordion-collapse @if($cat->id == $subcat->category_id) collapsed  @else   collapse show @endif " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    @foreach($cat->subcategorias as $cp)
                        <a class="accordion-body  @if($cp->id == $sc) a_b_a @else   @endif" href="{{ route('website.productos.subgrupo', [ $cp->id ])}}" >
                            <div >
                                    {{ $cp->name }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
    @endforeach
    </div>

</div>

<div class="col-12 col-lg-8">

<div class="product2-list" >
            @foreach ($productos as $item)
            <a  href="{{ route('website.producto', $item->id) }}" 
                class="product2-list__item">
                <div class="product2-list__overlay"></div>
                <div class="product2-list__container"  style="
                background-image: url({{ $item->image }});
                height: 250px;
                ">
                   
                </div>
                
                <div class="product2-list__title"> {{ $item->name }} </div>
            </a>
            @endforeach
        </div>


</div>

</div>

</div>

@endsection