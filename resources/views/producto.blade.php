@extends('layouts.public')

@section('content')

<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Productos / {{ $producto->cat_title }} /  {{ $producto->scat_title }} / {{ $producto->name }}
    </div>
</div>
<div class="container mb-5">
<div class="row mt-4">

<div class="col-12 col-md-4 col-lg-3">

<div class="accordion  accordion-flush" id="accordionExample">
    @foreach($categorias as $cat)

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $cat->id }}">
            <button class="accordion-button @if($cat->id == $producto->pcat_id)  @else  @endif " 
            type="button" data-bs-toggle="collapse" 
            data-bs-target="#collapse{{ $cat->id }}" 
            aria-expanded="@if($cat->id == $producto->pcat_id) true @else false @endif " 
            aria-controls="collapse{{ $cat->id }}">
               {{ $cat->title }}
            </button>
            </h2>
            <div id="collapse{{ $cat->id }}" 
                class="accordion-collapse @if($cat->id == $producto->pcat_id) collapsed  @else   collapse show @endif " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                @foreach($cat->subcategorias as $cp)
                  <a class="accordion-body  @if($cp->id == $selprod) a_b_a @else   @endif" 
                  href="{{ route('website.productos.subgrupo', [ $cp->id ])}}"
                        >
                            <div data-toggle="collapse" data-target="#collapse{{$cat->id}}-{{$cp->id}}"  style="font-weight: bolder;" >
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

<div class = "">
  <div class = "card" style="border: none;">
    <!-- card left -->
    <div class = "product-imgs">
      <div class = "img-display">
        <div class = "img-showcase">
          <img src = "{{ $producto->image }}" alt = " ... ">
          <img src = "{{ $producto->image1 }}" alt = " ... ">
          <img src = "{{ $producto->image2 }}" alt = " ... ">
          <img src = "{{ $producto->image3 }}" alt = " ... ">
          
          
        </div>
      </div>
      <div class = "img-select">
        <div class = "img-item">
          <a href = "#" data-id = "1">
            <img src = "{{ $producto->image }}" alt = " ... ">
          </a>
        </div>
        @if($producto->image1)
        <div class = "img-item">
          <a href = "#" data-id = "2">
            <img src = "{{ $producto->image1 }}" alt = " ... ">
          </a>
        </div>
        @endif
        @if($producto->image2)
        <div class = "img-item">
          <a href = "#" data-id = "3">
            <img src = "{{ $producto->image2 }}" alt = " ... ">
          </a>
        </div>
        @endif
        @if($producto->image3)
        <div class = "img-item">
          <a href = "#" data-id = "4">
            <img src = "{{ $producto->image3 }}" alt = " ... ">
          </a>
        </div>
        @endif
      </div>
    </div>
    <!-- card right -->
    <div class = "product-content">
      <h2 class = "product-title">{{ $producto->name }}</h2>

      <div class = "product-detail mb-3">
        
        {!! $producto->short_desc !!}
      </div>

        @if($producto->ficha)
        <button type = "button" class = "btn btn-sm btn-danger">Descargar Ficha
          <i class = "fas fa-download"></i> 
        </button>
        @endif

      @if($producto->client_price)
        <div class = "purchase-info" style="line-height: 35px;">

          <div style="">
          
          <hr>

          <add-to-cart @click="$refs.cart.add({{$producto->id}}, $refs.me.qty)"
            unit="{{ $producto->unit ?? 1 }}"
            price="{{ $producto->client_price }}"
            id="{{ $producto->id }}"
            ref="me"
          />
          
          </div>

        </div>
      @endif


    </div>
  </div>
</div>

<div class="product-detail">

<h5>Descripción</h5>
{!! $producto->description !!}
<h5>gama de productos</h5>
{!! $producto->gama !!}

</div>

<h5> Productos Relacionados</h5>

{{ $producto->rel }}

</div>

</div>

</div>



@endsection
@section('scripts')


<script>
    const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
</script>
@endsection