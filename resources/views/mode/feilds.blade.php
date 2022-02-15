<span class="section">Personal Info</span>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" value="{{isset($mode) ? $mode->name: ''}}" required="required" />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Ghi chú<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" name="note" class='email' required="required" value="{{isset($mode) ? $mode->note: ''}}"  /></div>
    </div>
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary">Submit</button>
            @if(isset($mode))
            <a class="btn btn-success" href="{{route('mode.delete',['id' => $mode->id])}}">Delete</a>
            @endif
        </div>
    </div>
</div>