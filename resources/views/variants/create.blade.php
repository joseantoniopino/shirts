@extends('layouts.app')
@section('page_title', 'Crear variante')

@section('content')
    <div class="container">
        <h1>Crear variante</h1>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'variants.store']) !!}
                    @include('variants.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
