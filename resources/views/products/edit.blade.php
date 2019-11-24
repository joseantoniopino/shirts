@extends('layouts.app')
@section('page_title', 'Editar producto')

@section('content')
    <div class="container">
        <h1>Editar producto</h1>
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($product, ['route' => ['products.update', $product->id],'method' => 'PUT']) !!}
                    @include('products.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
