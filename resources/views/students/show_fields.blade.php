<!-- Username Field -->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $student->username }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $student->password }}</p>
</div>

<!-- Full Name Field -->
<div class="form-group">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $student->full_name }}</p>
</div>

<!-- Grade Field -->
<div class="form-group">
    {!! Form::label('grade', 'Grade:') !!}
    <p>{{ $student->grade }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $student->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $student->updated_at }}</p>
</div>

