<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $user->name }}</p>
</div>

<div class="col-sm-6">
    {!! Form::label('username', 'Usuario:') !!}
    <p>{{ $user->username }}</p>
</div>

<!-- Role Field -->
<div class="col-sm-6">
    {!! Form::label('role', 'Rol:') !!}
    <p>{{ implode(' ', $user->getRoleNames()->toArray()) }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-6">
    {!! Form::label('created_at', 'Creado en:') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-6">
    {!! Form::label('updated_at', 'Actualizado en:') !!}
    <p>{{ $user->updated_at }}</p>
</div>
