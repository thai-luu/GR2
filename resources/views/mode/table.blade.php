<?php $count=0 ?>
<div class="clearfix"></div>

@include('flash::message')

<div class="table-responsive">
    <table class="table" id="modes-table">
        <thead>
            <tr>
                <th width="10"><input type="checkbox" class="s_check_all"></th>
                <th>ID</th>
                <th>Tên</th>
                <th>Ghi chú</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($modes as $mode)
            <tr>
                <td><input type="checkbox" class="cb_select_record check" value="{{$mode->id}}"></td>
                <td>{{ $mode ? $mode->id : 0 }}</td>
                <td>{{ $mode ? $mode->name : ''}}</td>
                <td>{{ $mode ? $mode->note : ''}}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('mode.edit', [$mode->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
                </td>
            </tr>
            <?php $count++; ?>
        @endforeach
        </tbody>
    </table>
</div>

@if($modes != [])
<div class="linkPage">
    {{ $modes->links('vendor.pagination.bootstrap-4') }}
</div>
@endif
@if($modes == [])
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: 0</p></div>
@elseif($modes->total()<= 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$modes->total()}}</p></div>
@elseif ($modes->total() > 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$count}} trên tổng số {{$modes->total()}} bản ghi</p></div>
@endif
