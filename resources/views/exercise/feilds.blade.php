<span class="section">Thông tin chế độ tập</span>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" value="{{$excercise->name ?? ''}}" required="required" />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Thời gian<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" name="time"  required="required" value="{{$excercise->time ?? ''}}" type="text" /></div>
</div>                   
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Tip<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" id="Carb" name="tip" pattern="{8,}" value="{{$excercise->tip ?? ''}}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Giới thiệu<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" id="Carb" name="introduce" pattern="{8,}" value="{{$excercise->introduce ?? ''}}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Calo đốt cháy<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" data-validate-linked='password' name="calories" value="{{$excercise->calories ?? ''}}" required='required' /></div>
</div>
<div class="field item form-group">
    <label class="control-label col-md-3 col-sm-3  label-align ">Phân loại</label>
    <div class="col-md-6 col-sm-6 ">
        <select class="select2_group form-control" name="body_parts">
                <option value="0"{{(isset($excercise) && $excercise->classify == 0) ? 'selected':'' }}>Tay</option>
                <option value="1" {{(isset($excercise) && $excercise->classify == 1) ? 'selected':'' }}>Chân</option>
                <option value="2" {{(isset($excercise) && $excercise->classify == 2) ? 'selected':'' }}>Ngực</option>
                <option value="3"{{(isset($excercise) && $excercise->classify == 3) ? 'selected':'' }}>Vai</option>
                <option value="4" {{(isset($excercise) && $excercise->classify == 4) ? 'selected':'' }}>Mông</option>
                <option value="5" {{(isset($excercise) && $excercise->classify == 5) ? 'selected':'' }}>Lưng</option>
        </select>
    </div>
</div> 
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary">Submit</button>
            @if (isset($excercise))
            <a href="{{route('excercise.delete',['id' => $excercise->id])}}"><button class="btn btn-success">Delete</button></a>
            @endif
            
        </div>
    </div>
</div>