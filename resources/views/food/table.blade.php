<?php $count=0 ?>
<div class="clearfix"></div>

@include('flash::message')

<div class="table-responsive">
    <table class="table" id="foods-table">
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
        @foreach($foods as $food)
            <tr>
                <td><input type="checkbox" class="cb_select_record check" value="{{$food->id}}"></td>
                <td>{{ $food ? $food->id : 0 }}</td>
                <td>{{ $food ? $food->name : ''}}</td>
                <td>{{ $food ? $food->protein : ''}}</td>
                <td>{{ $food ? $food->carb : ''}}</td>
                <td>{{ $food ? $food->fat : '' }}</td>
                <td>{{ $food ? $food->Cenluloza : '' }}</td>
                <td>{{ $food ? $food->vitaminA : '' }}</td>
                <td>{{ $food ? $food->vitaminB : ''}}</td>
                <td>{{ $food ? $food->natri : ''}}</td>
                <td>{{ $food ? $food->kali : ''}}</td>
                <td>
                   
                    <div class='btn-group'>  
                     <a href="{{ route('food.edit', [$food->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>               
                    </div>
                </td>
            </tr>
            <?php $count++; ?>
        @endforeach
        </tbody>
    </table>
</div>

@if($foods != [])
<div class="linkPage">
    {{ $foods->links('vendor.pagination.bootstrap-4') }}
</div>
@endif
@if($foods == [])
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: 0</p></div>
@elseif($foods->total()<= 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$foods->total()}}</p></div>
@elseif ($foods->total() > 10)
    <div><p style="margin-top: 15px; font-weight: bold;color: red;position: absolute;right: 28px;">Tổng số bản ghi: {{$count}} trên tổng số {{$foods->total()}} bản ghi</p></div>
@endif
