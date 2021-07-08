@extends('layouts.public')

@section('content')
<div class="container" style="min-height: 493px;">
<div class="mt-3">
<h3> ORDEN #{{ $data->id }}</h3>
</div>
<table class="table mt-5 mb-5">
  <thead>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data->items as $item)
    
    <tr>
      
      <td> {{ $item->title }} </td>
      <td> $ {{ display_price($item->total / $item->quantity) }} </td>
      <td> {{ $item->quantity }} </td>
      <td> $ {{ display_price($item->total) }} </td>

      
    </tr>
@endforeach

    
   
  </tbody>
</table>

</div>

@endsection