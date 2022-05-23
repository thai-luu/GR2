<?php $count=0 ?>
<div class="clearfix"></div>

@include('flash::message')

<div class="table-responsive">
    <table class="table" id="exercises-table">
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
        @foreach($exercises as $exercise)
            <tr>
                <td><input type="checkbox" class="cb_select_record check" value="{{$exercise->id}}"></td>
                <td>{{ $exercise ? $exercise->id : 0 }}</td>
                <td>{{ $exercise ? $exercise->name : ''}}</td>
                <td>{{ $exercise ? $exercise->email : ''}}</td>
                <td>{{ $exercise ? $exercise->role : ''}}</td>
                <td>{{ $exercise ? $exercise->created_at : 0 }}</td>
                <td>
                    {{-- {!! Form::open(['route' => ['exercises.destroy', $exercise->id], 'method' => 'delete']) !!} --}}
                    <div class='btn-group'>
                        {{-- <a href="{{ route('exercises.show', [$exercise->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        <a href="{{ route('exercise.edit', [$exercise->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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

@if($exercises != [])
<div class="linkPage">
    {{ $exercises->links('vendor.pagination.bootstrap-4') }}
</div>
@endif
@if($exercises == [])
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: 0</p></div>
@elseif($exercises->total()<= 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$exercises->total()}}</p></div>
@elseif ($exercises->total() > 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$count}} trên tổng số {{$exercises->total()}} bản ghi</p></div>
@endif
