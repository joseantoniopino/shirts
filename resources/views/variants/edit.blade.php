@extends('layouts.app')
@section('page_title', 'Editar variante')

@section('content')
    <div class="container">
        <h1>Editar variante</h1>
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($variant, ['route' => ['variants.update', $variant->id],'method' => 'PUT']) !!}
                    @include('variants.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
