<div class="form-group{{ $errors->has('table') ? 'has-error': '' }}">
	{!! Form::label('table', 'Pilih Komponen', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('table', ['Komponenh' => 'Komponen H', 'Komponend' => 'Komponen D', 'Komponeni' => 'Komponen I', 'Komponenf' => 'Komponen F', 'Komponenz', 'Komponen Z', 'Kindex' => 'K Indeks', 'Prekursor' => 'Prekursor', 'Absolut' => 'Absolut'], null, ['placeholder' => 'Pilih Komponen']) !!}
		{!! $errors->first('table', '<p class="help-block">:message </p>' ) !!}
	</div>
</div>
<div class="form-group{{ $errors->has('excel') ? ' has-error' : '' }}">
  {!! Form::label('excel', 'Pilih file', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::file('excel') !!}
    {!! $errors->first('excel', '<p class="help-block">:message</p>') !!}
  </div>
</div>
<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}
  </div>
</div>