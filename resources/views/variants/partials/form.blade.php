<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['placeholder' => 'Nombre', 'id' => 'name', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('size', 'Tamaño:') !!}
    {!! Form::text('size', null, ['placeholder' => 'Tamaño', 'id' => 'size', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Precio:') !!}
    {!! Form::text('price', null, ['placeholder' => 'Nombre', 'id' => 'price', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('optional_price', 'Precio Opcional:') !!}
    {!! Form::text('optional_price', null, ['placeholder' => 'Rellenar si se quiere hacer un descuento', 'id' => 'optional_price', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('variant', 'Talla:') !!}
    {!! Form::select('products[]', $products, null, [
        'id' => 'variant',
        'class' => 'form-control',
        'placeholder' => 'Seleccione los productos...',
        'multiple'
    ]) !!}
</div>

<div class="form-group">
    {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
    <a href="{{route('variants.index')}}" class="btn btn-info">Ver listado</a>
</div>
