@extends('layouts.public')

@section('content')
<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Productos / {{ $sc }}
    </div>
</div>
<div class="container mb-5">
<div class="row mt-4">

<div class="col-md-4 col-lg-3">

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

<div class="col-12 col-lg-9">

<div class="product2-list" >
            @foreach ($productos as $item)
            
            <div  href="" 
                class="product-list__item">
                <div class="product-list__overlay">

                    <div class="vermas">
                        <p style="font-weight: 500; padding:0; margin: 0;">$ {{ display_price($item->price)}}</p>
                        <p style="color: #; margin: 0; font-size: 10px;"> {{ $item->unit }} unidades.</p>
                    </div>

                </div>
                <div class="product-list__container"  style="
                background-image: url({{ $item->image }});
                height: 250px;
                "
                onclick="location.href='{{ route('website.producto', $item->id) }}'"
                >
                   
                </div>
                
<quick-atc @click="$refs.cart.add({{$item->id}}, $refs.me.qty)"
            unit="{{ $item->unit ?? 1 }}"
            ptitle="{{ $item->name }}"
            price="{{ $item->client_price }}"
            id="{{ $item->id }}"
            ref="me"
            />
                    
                
</div>
         

            @endforeach
        </div>


</div>

</div>

</div>

@endsection