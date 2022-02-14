<span class="section">Personal Info</span>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" value="{{isset($user) ? $user->name: ''}}" required="required" />
    </div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" name="email" class='email' required="required" value="{{isset($user) ? $user->email: ''}}" type="email" /></div>
</div>                   
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="password" id="password1" name="password" pattern="{8,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
        
        <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
            <i id="slash" class="fa fa-eye-slash"></i>
            <i id="eye" class="fa fa-eye"></i>
        </span>
    </div>
</div>

<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Repeat password<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="password" name="password2" data-validate-linked='password' required='required' /></div>
</div>
<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <input class="form-control" type="tel" class='tel' name="telephone" required='required' value="{{isset($user) ? $user->telephone: ''}}" data-validate-length-range="8,20" /></div>
</div>
<div class="field item form-group">
    <label class="control-label col-md-3 col-sm-3  label-align ">Quyền</label>
    <div class="col-md-6 col-sm-6 ">
        <select class="select2_group form-control" name="permissions">
                <option value="CTV"{{(isset($user) && $user->permissions[0]->name == 'CTV') ? 'selected':'' }}>Cộng tác viên</option>
                <option value="QTV" {{(isset($user) && $user->permissions[0]->name == 'QTV') ? 'selected':'' }}>Quản trị viên</option>
                <option value="ND" {{(isset($user) && $user->permissions[0]->name == 'ND') ? 'selected':'' }}>Người dùng</option>
        </select>
    </div>
</div>
            
<div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary">Submit</button>
            @if(isset($user))
            <a class="btn btn-success" href="{{route('user.delete',['id' => $user->id])}}">Delete</a>
            @endif
        </div>
    </div>
</div>