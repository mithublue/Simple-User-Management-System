<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('caps', 'Capabilities', ['class' => 'col-md-4 control-label']) !!}

    @foreach( $caps as $cap => $cap_data )
        @foreach( $cap_data as $capname => $label )
            <div class="col-md-3">
                <label>
                    <input type="checkbox" name="caps[{{ $cap }}][{{ $capname }}]" value="1" <?php if( isset($role)  && isset( $sel_caps[$cap][$capname] ) && $sel_caps[$cap][$capname] == 1 )  echo  'checked' ; ?> >
                    {{ $label }}
                </label>
            </div>

        @endforeach
        @endforeach

</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
