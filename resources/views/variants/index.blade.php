@extends('layouts.app')
@section('page_title', 'Ver todas las tallas')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered mt-5">
                    <thead>
                    <tr>
                        <th scope="col">Talla</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($variants as $variant)
                            <tr>
                                <td>{{$variant->name}}</td>
                                <td>
                                    @foreach($variant->products as $product)

                                        @if(!$loop->last)
                                            {{$product->name}},
                                        @else
                                            {{$product->name}}
                                        @endif

                                    @endforeach
                                </td>
                                <td>
                                    @if(is_null($variant->optional_price))
                                        {{$variant->price}}
                                    @else
                                        {{$variant->optional_price}}
                                    @endif
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['variants.destroy', $variant->id], 'method' => 'delete']) !!}
                                        <a href="{{route('variants.show', [$variant->id])}}" class="btn btn-primary mr-1">Ver</a>
                                        <a href="{{route('variants.edit', [$variant->id])}}" class="btn btn-info mr-1">Editar</a>
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>La talla más económica es <mark>{{ $cheapVariant->name }}</mark></p>
                <p>El precio promedio es: <mark>{{ $avgPrice }}</mark></p>
                <p>El precio opcional promedio es: <mark>{{ $avgOptionalPrice }}</mark></p>
                <a href="{{route('variants.create')}}" class="btn btn-primary float-right">Crear nueva talla</a>
            </div>
        </div>
    </div>
@endsection
