<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $period->name }}</p>
</div>

<!-- Teacher Id Field -->
<div class="form-group">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    <p>{{ $period->teacher_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $period->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $period->updated_at }}</p>
</div>

