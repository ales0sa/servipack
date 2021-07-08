@extends('layouts.public')

@section('content')
<div class="container" style="min-height: 493px;">
<table class="table mt-5 mb-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">Dirección</th>
      <th scope="col">Forma de Pago</th>
      <th scope="col">Forma de Envío</th>
      <th scope="col">Total</th>
      <th scope="col">Estado</th>
      <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->created_at->format('d-m-Y') }}</td>
      <td> {{ $item->direccion }}</td>
      <td> 
        @switch($item->pago)
            @case(0)
            Efectivo
            @break
            @case(1)
            Transferencia Bancaria 
            @break
            @case(2)
            MercadoPago
            @break
        @endswitch

      
      
      </td>
      <td>

      @switch($item->envio)
            @case(0)
            Retira en el local
            @break
            @case(1)
            Envío CABA/GBA
            @break
            @case(2)
            Expreso ( {{ $item->expreso }})
            @break
        @endswitch


      
      
      </td>
      <td> $ {{ display_price($item->total) }}</td>
      <td> {{ $item->estado ?? 'En proceso..' }}</td>
      <td> 
      <a href="/verorden/{{ $item->id }}">
        <button class="btn btn-sm btn-info"> <i class="fa fa-list"></i> </button>
        </a>
      
      </td>
    </tr>
@endforeach

    
   
  </tbody>
</table>

</div>

@endsection