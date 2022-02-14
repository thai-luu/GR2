<?php $count=0 ?>
<div class="clearfix"></div>

@include('flash::message')

<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th width="10"><input type="checkbox" class="s_check_all"></th>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created_at</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td><input type="checkbox" class="cb_select_record check" value="{{$user->id}}"></td>
                <td>{{ $user ? $user->id : 0 }}</td>
                <td>{{ $user ? $user->name : ''}}</td>
                <td>{{ $user ? $user->email : ''}}</td>
                <td>{{ $user ? $user->role : ''}}</td>
                <td>{{ $user ? $user->created_at : 0 }}</td>
                <td>
                    {{-- {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!} --}}
                    <div class='btn-group'>
                        {{-- <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        <a href="{{ route('user.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </td>
            </tr>
            <?php $count++; ?>
        @endforeach
        </tbody>
    </table>
</div>

@if($users != [])
<div class="linkPage">
    {{ $users->links('vendor.pagination.bootstrap-4') }}
</div>
@endif
@if($users == [])
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: 0</p></div>
@elseif($users->total()<= 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$users->total()}}</p></div>
@elseif ($users->total() > 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$count}} trên tổng số {{$users->total()}} bản ghi</p></div>
@endif
