<span class="section">Thông tin chế độ tập</span>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" value="{{$excerciseMode->name ?? ''}}" required="required" />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Thời gian<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" name="time"  required="required" value="{{$excerciseMode->time ?? ''}}" type="text" /></div>
</div>                   
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Ghi chú<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" id="Carb" name="note" pattern="{8,}" value="{{$excerciseMode->note ?? ''}}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
    </div>
</div>

<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Calo đốt cháy<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" data-validate-linked='password' name="calories" value="{{$excerciseMode->calories ?? ''}}" required='required' /></div>
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
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Vitamin A<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" name="vitaminA" data-validate-linked='password' name="fat" value="{{$excerciseMode->vitaminA ?? ''}}" required='required' /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Vitamin B<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text"  name="vitaminB" required='required' value="{{$excerciseMode->cenluloza ?? ''}}" data-validate-length-range="8,20" /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Natri<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" name="natri" data-validate-linked='password' name="fat" value="{{$excerciseMode->natri ?? ''}}" required='required' /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Kali<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="tex"  name="kali" required='required' value="{{$excerciseMode->cenluloza ?? ''}}" data-validate-length-range="8,20" /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Calories<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="tex"  name="calo" required='required' value="{{$excerciseMode->calo ?? ''}}" data-validate-length-range="8,20" /></div>
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