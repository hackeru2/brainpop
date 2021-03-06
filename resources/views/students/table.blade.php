<div class="table-responsive">
    <table class="table" id="students-table">
        <thead>
            <tr>
                <th>Username</th>
        <th>Password</th>
        <th>Full Name</th>
        <th>Grade</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->username }}</td>
            {{-- <td>{{ $student->password }}</td> --}}
            <td>{{ '*********' }}</td>  
            <td>{{ $student->full_name }}</td>
            <td>{{ $student->grade }}</td>
                <td>
                    {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('students.show', [$student->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('students.edit', [$student->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
