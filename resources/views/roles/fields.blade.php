<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Permissions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permissions', 'Permisos:') !!}
    {{-- <select  class = "form-control" id="permissions" name = "permissions[]" multiple="multiple">
    </select> --}}
    {!! Form::select('permissions', $permissionItems, null, ['multiple' => 'multiple', 'class' => 'form-control', 'name' => 'permissions[]']) !!}
</div>
