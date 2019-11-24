@extends('layouts.app')
@section('page_title', 'Ver detalle de talla')

@section('content')
    <div class="container">
        <h1>{{$variant->name}}</h1>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>Tamaño: {{strtoupper($variant->size)}}</li>
                    <li>Precio: {!! (is_null($variant->optional_price)) ? $variant->price . "€" : "<span style='color: green'>". $variant->optional_price . "€</span>" !!}</li>
                    @foreach($variant->products as $product)
                        <li>Producto con esta talla: {{$product->name}}</li>
                    @endforeach
                </ul>
            </div>
            <a href="{{route('variants.index')}}" class="btn btn-info">Ver listado</a>
        </div>
    </div>
@endsection
