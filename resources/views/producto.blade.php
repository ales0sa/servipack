@extends('layouts.public')

@section('content')

<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Productos / {{ $categoria->title }} / {{ $producto->name }}
    </div>
</div>
<div class="container mb-5">
<div class="row mt-4">

<div class="col-12 col-md-4 col-lg-3">

<div class="accordion  accordion-flush" id="accordionExample">
    @foreach($categorias as $cat)

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button @if($cat->id == $categoria->id)  @else collapsed @endif " 
            type="button" data-bs-toggle="collapse" 
            data-bs-target="#collapse{{ $cat->id }}" 
            aria-expanded="@if($cat->id == $categoria->id) true @else false @endif " 
            aria-controls="collapse{{ $cat->id }}">
               {{ $cat->title }}
            </button>
            </h2>
            <div id="collapse{{ $cat->id }}" 
                class="accordion-collapse @if($cat->id == $categoria->id) collapsed  @else   collapse show @endif " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                @foreach($cat->productos as $cp)
                    <a class="accordion-body  @if($cp->id == $selprod) a_b_a @else   @endif" href="{{ route('website.producto', [ $cp->id ])}}" >
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

<div class="col-9">

<div class = "">
  <div class = "card">
    <!-- card left -->
    <div class = "product-imgs">
      <div class = "img-display">
        <div class = "img-showcase">
          <img src = "{{ $producto->image }}" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt = "shoe image">
        </div>
      </div>
      <div class = "img-select">
        <div class = "img-item">
          <a href = "#" data-id = "1">
            <img src = "{{ $producto->image }}" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "2">
            <img src = "{{ $producto->image }}" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "3">
            <img src = "{{ $producto->image }}" alt = "shoe image">
          </a>
        </div>
        <div class = "img-item">
          <a href = "#" data-id = "4">
            <img src = "{{ $producto->image }}" alt = "shoe image">
          </a>
        </div>
      </div>
    </div>
    <!-- card right -->
    <div class = "product-content">
      <h2 class = "product-title">{{ $producto->name }}</h2>

      <div class = "product-detail">
        
        
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
        <ul>
          <li>Color: <span>Black</span></li>
          <li>Available: <span>in stock</span></li>
          <li>Category: <span>Shoes</span></li>
          <li>Shipping Area: <span>All over the world</span></li>
          <li>Shipping Fee: <span>Free</span></li>
        </ul>
      </div>

      <div class = "purchase-info">
        <input class="" type = "number" min = "0" value = "1">
        <button type = "button" class = "btn">
          Al carrito <i class = "fas fa-shopping-cart"></i>
        </button>
        <button type = "button" class = "btn">Ficha
        <i class = "fas fa-download"></i> 
        </button>
      </div>

    </div>
  </div>
</div>

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