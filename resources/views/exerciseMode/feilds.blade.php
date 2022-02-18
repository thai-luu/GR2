<span class="section">Thông tin chế độ tập</span>
<div id="exer">
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" value="{{$excerciseMode->name ?? ''}}"  />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Thời gian<span class="">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" name="time"   value="{{$excerciseMode->time ?? ''}}" type="text" /></div>
</div>                   
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Ghi chú<span class="">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" id="Carb" name="note" pattern="{8,}" value="{{$excerciseMode->note ?? ''}}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character"  />
    </div>
</div>

<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Calo đốt cháy<span class="">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" data-validate-linked='password' name="calories" value="{{$excerciseMode->calories ?? ''}}"  /></div>
</div>
<div class="field item form-group">
    <label class="control-label col-md-3 col-sm-3  label-align ">Phân loại</label>
    <div class="col-md-6 col-sm-6 ">
        <select class="select2_group form-control" name="classify">
                <option value="0"{{(isset($excerciseMode) && $excerciseMode->classify == 0) ? 'selected':'' }}>Thịt</option>
                <option value="1" {{(isset($excerciseMode) && $excerciseMode->classify == 1) ? 'selected':'' }}>Rau</option>
                <option value="2" {{(isset($excerciseMode) && $excerciseMode->classify == 2) ? 'selected':'' }}>Củ quả</option>
        </select>
    </div>
</div>
<div class="field item form-group" id="BuoiTap">
    <label class="col-form-label col-md-3 col-sm-3  label-align" id="'buoi' + i">Buoi tap<span class="">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" name="'buoi' + i" data-validate-linked='password' name="fat" value="{{$excerciseMode->vitaminA ?? ''}}"  /></div>
    </div>
<div class="field item form-group">
    <button type="button" onclick="themBt()">
        Thêm buổi tập
    </button>
</div>
</div>
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary">Submit</button>
            @if (isset($excerciseMode))
            <a href="{{route('excerciseMode.delete',['id' => $excerciseMode->id])}}"><button class="btn btn-success">Delete</button></a>
            @endif
            
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function(){
    function themBt(){
        console.log(123);
        $("#exer").append("<div class="field item form-group"><label class="col-form-label col-md-3 col-sm-3  label-align" id="i">Buoi tap<span class="">*</span></label><div class="col-md-6 col-sm-6"><input class="form-control" type="text" name="i" data-validate-linked='password' name="fat" value=""  /></div></div>");
    }
});
</script>
@endpush