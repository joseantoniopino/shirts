@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered mt-5">
                    <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Precios</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>
                                    @foreach($product->variants as $variant)

                                        @if(!$loop->last)
                                            {{$variant->name}},
                                        @else
                                            {{$variant->name}}
                                        @endif

                                    @endforeach
                                </td>
                                <td>
                                    @foreach($product->variants as $variant)
                                        @if(is_null($variant->optional_price))

                                            @if(!$loop->last)
                                                {{$variant->price}}€,
                                            @else
                                                {{$variant->price}}€
                                            @endif

                                        @else

                                            @if(!$loop->last)
                                                {{$variant->optional_price}}€,
                                            @else
                                                {{$variant->optional_price}}€
                                            @endif

                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                                        <a href="{{route('products.show', [$product->id])}}" class="btn btn-primary mr-1">Ver</a>
                                        <a href="{{route('products.edit', [$product->id])}}" class="btn btn-info mr-1">Editar</a>
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('products.create')}}" class="btn btn-primary float-right">Crear nuevo producto</a>
            </div>
        </div>
    </div>
@endsection
