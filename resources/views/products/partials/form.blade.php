<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['placeholder' => 'Nombre', 'id' => 'name', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('variant', 'Talla:') !!}
    {!! Form::select('variants[]', $variants, null, [
        'id' => 'variant',
        'class' => 'form-control',
        'placeholder' => 'Selecciona una talla...',
        'multiple'
    ]) !!}
</div>
<div class="form-group">
    {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
    <a href="{{route('products.index')}}" class="btn btn-info">Ver listado</a>
</div>
