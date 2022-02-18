<?php $count=0 ?>
<div class="clearfix"></div>

@include('flash::message')

<div class="table-responsive">
    <table class="table" id="exerciseModes-table">
        <thead>
            <tr>
                <th width="10"><input type="checkbox" class="s_check_all"></th>
                <th>ID</th>
                <th>Tên</th>
                <th>Protein</th>
                <th>Carb</th>
                <th>Fat</th>
                <th>Cenluloza</th>
                <th>vitamin A</th>
                <th>vitamin B</th>
                <th>Natri</th>
                <th>Kali</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($exerciseModes as $exerciseMode)
            <tr>
                <td><input type="checkbox" class="cb_select_record check" value="{{$exerciseMode->id}}"></td>
                <td>{{ $exerciseMode ? $exerciseMode->id : 0 }}</td>
                <td>{{ $exerciseMode ? $exerciseMode->name : ''}}</td>
                <td>{{ $exerciseMode ? $exerciseMode->protein : ''}}</td>
                <td>{{ $exerciseMode ? $exerciseMode->carb : ''}}</td>
                <td>{{ $exerciseMode ? $exerciseMode->fat : 0 }}</td>
                <td>{{ $exerciseMode ? $exerciseMode->vitaminA : 0 }}</td>
                <td>{{ $exerciseMode ? $exerciseMode->vitaminB : ''}}</td>
                <td>{{ $exerciseMode ? $exerciseMode->natri : ''}}</td>
                <td>{{ $exerciseMode ? $exerciseMode->kali : ''}}</td>
                <td>
                   
                    <div class='btn-group'>  
                     <a href="{{ route('exerciseMode.edit', [$exerciseMode->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>               
                    </div>
                </td>
            </tr>
            <?php $count++; ?>
        @endforeach
        </tbody>
    </table>
</div>

@if($exerciseModes != [])
<div class="linkPage">
    {{ $exerciseModes->links('vendor.pagination.bootstrap-4') }}
</div>
@endif
@if($exerciseModes == [])
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: 0</p></div>
@elseif($exerciseModes->total()<= 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$exerciseModes->total()}}</p></div>
@elseif ($exerciseModes->total() > 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$count}} trên tổng số {{$exerciseModes->total()}} bản ghi</p></div>
@endif
