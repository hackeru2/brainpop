<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','minlength' => 3]) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','minlength' => 6]) !!}
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control','minlength' => 3]) !!}
</div>

<!-- Grade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grade', 'Grade:') !!}
    {!! Form::text('grade', null, ['class' => 'form-control','minlength' => 0,'maxlength' => 12]) !!}
</div>

<!-- Submit Field -->

<div class="form-group col-sm-6">
    {!! Form::label('Periods', 'Periods:') !!}
        <select class="multi">
            <option value="" disabled selected>Select your flavor</option>
            <option value="vanilla">JavaScript</option>
            <option value="jquery">jQuery</option>
            <option value="css">HTML/CSS</option>
            <option value="react">React.js</option>
            <option value="angular">Angular</option>
          </select>
  
  
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('students.index') }}" class="btn btn-default">Cancel</a>
</div>



