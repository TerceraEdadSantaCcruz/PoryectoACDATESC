<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Permissions Field -->
<div class="col-sm-12">
    {!! Form::label('permissions', 'Permisos:') !!}
    <p>{{ implode(', ', $role->permissions->pluck('name')->toArray()) }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-6">
    {!! Form::label('created_at', 'Creado en:') !!}
    <p>{{ $role->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-6">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{{ $role->updated_at }}</p>
</div>
