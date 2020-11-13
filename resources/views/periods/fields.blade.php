<!-- Name Field -->

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Teacher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    {!! Form::text('teacher_id', null, ['class' => 'form-control']) !!}
</div>

 
<!-- Students Field -->
@component('components.multi-select' , ['students' => $students,'periodStudents' => $period->students ])
@endcomponent

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('periods.index') }}" class="btn btn-default">Cancel</a>
</div>



