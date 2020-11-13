<li class="{{ Request::is('teachers*') ? 'active' : '' }}">
    <a href="{{ route('teachers.index') }}"><i class="fa fa-edit"></i><span>Teachers</span></a>
</li>

<li class="{{ Request::is('periods*') ? 'active' : '' }}">
    <a href="{{ route('periods.index') }}"><i class="fa fa-edit"></i><span>Periods</span></a>
</li>

<li class="{{ Request::is('students*') ? 'active' : '' }}">
    <a href="{{ route('students.index') }}"><i class="fa fa-edit"></i><span>Students</span></a>
</li>

