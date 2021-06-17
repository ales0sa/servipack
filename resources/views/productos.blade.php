@extends('layouts.public')

@section('content')
<div class="row-fluid breadcrumbs">
    <div class="container">

        <i class="fa fa-home"></i> Productos / {{ $categoria->title }}
    </div>
</div>
<div class="container mb-5">
<div class="row mt-4">

<div class="col-12 col-md-4 col-lg-4">

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

</div>

</div>

</div>

@endsection