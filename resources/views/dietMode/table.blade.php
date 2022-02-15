<?php $count=0 ?>
<div class="clearfix"></div>

@include('flash::message')

<div class="table-responsive">
    <table class="table" id="dietModes-table">
        <thead>
            <tr>
                <th width="10"><input type="checkbox" class="s_check_all"></th>
                <th>ID</th>
                <th>Tên</th>
                <th>Carb</th>
                <th>Protein</th>
                <th>Fat</th>
                <th>Cenluloza</th>
                <th>Phân loại</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dietModes as $dietMode)
            <tr>
                <td><input type="checkbox" class="cb_select_record check" value="{{$dietMode->id}}"></td>
                <td>{{ $dietMode ? $dietMode->id : 0 }}</td>
                <td>{{ $dietMode ? $dietMode->name : ''}}</td>
                <td>{{ $dietMode ? $dietMode->carb : ''}}%</td>
                <td>{{ $dietMode ? $dietMode->protein : ''}}%</td>
                <td>{{ $dietMode ? $dietMode->fat : ''}}%</td>
                <td>{{ $dietMode ? $dietMode->cenluloza : ''}}%</td>
                <td>{{ $dietMode ? $dietMode->mode->name : ''}}%</td>
                <td>
                    <div class='btn-group'> 
                        <a href="{{ route('dietMode.edit', [$dietMode->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>    
                    </div>
                </td>
            </tr>
            <?php $count++; ?>
        @endforeach
        </tbody>
    </table>
</div>

@if($dietModes != [])
<div class="linkPage">
    {{ $dietModes->links('vendor.pagination.bootstrap-4') }}
</div>
@endif
@if($dietModes == [])
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: 0</p></div>
@elseif($dietModes->total()<= 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$dietModes->total()}}</p></div>
@elseif ($dietModes->total() > 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$count}} trên tổng số {{$dietModes->total()}} bản ghi</p></div>
@endif
