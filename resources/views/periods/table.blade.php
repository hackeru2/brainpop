<div class="table-responsive">
    <table class="table" id="periods-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Teacher Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($periods as $period)
            <tr>
                <td>{{ $period->name }}</td>
            <td>{{ $period->teacher_id }}</td>
                <td>
                    {!! Form::open(['route' => ['periods.destroy', $period->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('periods.show', [$period->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('periods.edit', [$period->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
