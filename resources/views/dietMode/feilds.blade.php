<span class="section">Personal Info</span>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" value="{{isset($dietMode) ? $dietMode->name: ''}}" required="required" />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Carb<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" name="carb" class='email' required="required" value="{{isset($dietMode) ? $dietMode->carb: ''}}"  /></div>
       
    </div>     
    <label class="col-form-label col-md-1 col-sm-1  label-align">%</label>              
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Protein<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control"  id="password1" name="protein" pattern="{8,}" value="{{isset($dietMode) ? $dietMode->protein: ''}}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
    </div>
    <label class="col-form-label col-md-1 col-sm-1  label-align">%</label>  
</div>

<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Fat<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control"  name="fat" value="{{isset($dietMode) ? $dietMode->fat: ''}}" required='required' /></div>
        <label class="col-form-label col-md-1 col-sm-1  label-align">%</label>  
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Celuloza<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="tel" class='tel' name="cenluloza" required='required' value="{{isset($dietMode) ? $dietMode->cenluloza: ''}}" data-validate-length-range="8,20" /></div>
</div>
<div class="field item form-group">
    <label class="control-label col-md-3 col-sm-3  label-align ">Quyền</label>
    <div class="col-md-6 col-sm-6 ">
        <select class="select2_group form-control" name="mode_id">
             @foreach ($modes as $mode)
                <option value="{{$mode->id}}"{{(isset($dietMode) && $dietMode->mode->id == $mode->id) ? 'selected':'' }}>{{$mode->name}}</option>
                @endforeach
        </select>
    </div>
</div>
            
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary">Submit</button>
            @if(isset($dietMode))
            <a class="btn btn-success" href="{{route('dietMode.delete',['id' => $dietMode->id])}}">Delete</a>
            @endif
        </div>
    </div>
</div>