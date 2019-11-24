@extends('layouts.app')
@section('page_title', 'Ver detalle de producto')

@section('content')
    <div class="container">
        <h1>{{$product->name}}</h1>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @foreach($product->variants as $variant)
                        <li>{{$variant->name}}</li>
                        <li>La talla
                            <span style="color: blue">{{strtoupper($variant->size)}}</span> cuesta:
                            {!! (is_null($variant->optional_price)) ? $variant->price . "€" : "<span style='color: green'>". $variant->optional_price . "€</span>" !!}
                        </li>
                    @endforeach
                </ul>
            </div>
            <a href="{{route('products.index')}}" class="btn btn-info">Ver listado</a>
        </div>
    </div>
@endsection
