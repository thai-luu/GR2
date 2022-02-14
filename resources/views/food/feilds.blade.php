<span class="section">Food Info</span>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" value="{{$food->name ?? ''}}" required="required" />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Protein<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" name="protein"  required="required" value="{{$food->protein ?? ''}}" type="text" /></div>
</div>                   
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Carb<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" id="Carb" name="carb" pattern="{8,}" value="{{$food->carb ?? ''}}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
        
        <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
            <i id="slash" class="fa fa-eye-slash"></i>
            <i id="eye" class="fa fa-eye"></i>
        </span>
    </div>
</div>

<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Fat<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" name="fat" data-validate-linked='password' name="fat" value="{{$food->fat ?? ''}}" required='required' /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Cenluloza<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" class='text' name="cenluloza" required='required' value="{{$food->cenluloza ?? ''}}" data-validate-length-range="8,20" /></div>
</div>
<div class="field item form-group">
    <label class="control-label col-md-3 col-sm-3  label-align ">Phân loại</label>
    <div class="col-md-6 col-sm-6 ">
        <select class="select2_group form-control" name="classify">
                <option value="0"{{(isset($food) && $food->classify == 0) ? 'selected':'' }}>Thịt</option>
                <option value="1" {{(isset($food) && $food->classify == 1) ? 'selected':'' }}>Rau</option>
                <option value="2" {{(isset($food) && $food->classify == 2) ? 'selected':'' }}>Củ quả</option>
        </select>
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Vitamin A<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" name="vitaminA" data-validate-linked='password' name="fat" value="{{$food->vitaminA ?? ''}}" required='required' /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Vitamin B<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text"  name="vitaminB" required='required' value="{{$food->cenluloza ?? ''}}" data-validate-length-range="8,20" /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Natri<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="text" name="natri" data-validate-linked='password' name="fat" value="{{$food->natri ?? ''}}" required='required' /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Kali<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="tex"  name="kali" required='required' value="{{$food->cenluloza ?? ''}}" data-validate-length-range="8,20" /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Calories<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="tex"  name="calo" required='required' value="{{$food->calo ?? ''}}" data-validate-length-range="8,20" /></div>
</div>        
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary">Submit</button>
            @if (isset($food))
            <a href="{{route('food.delete',['id' => $food->id])}}"><button class="btn btn-success">Delete</button></a>
            @endif
            
        </div>
    </div>
</div>