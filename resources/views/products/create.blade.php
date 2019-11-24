@extends('layouts.app')
@section('page_title', 'Crear producto')

@section('content')
    <div class="container">
        <h1>Crear producto</h1>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'products.store']) !!}
                    @include('products.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
