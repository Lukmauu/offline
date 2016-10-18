<div class="page-header">
    <h1>Register Form</h1>
</div>

<a href="#" tabindex="-1" id="toTop"></a>

<form class="form-horizontal col-sm-7" action="register/makeUser" method="post" name="form-register">

   

<fieldset>

<!-- Form Name -->
<legend>Please fill out that form to register</legend>

 <div class="error-msg__">
        
    </div>

<!-- Text input-->
<div class="form-group">
    <h3><label class="label label-primary">First Name</label></h3>
    <input name="FirstName" type="text" class="form-control" />
</div>

<!-- Text input-->
<div class="form-group">
    <h3><label class="label label-primary">Last Name</label></h3>
    <input name="LastName" type="text" class="form-control" />
</div>

<!-- Text input-->
<div class="form-group">
    <h3><label class="label label-primary">User Name</label></h3>
    <input name="UserName" type="text" class="form-control" />
</div>

<!-- Text input-->
<div class="form-group">
    <h3><label class="label label-primary">Email</label></h3>
    <input name="Email" type="text" class="form-control" />
</div>

<!-- Password input-->
<div class="form-group">
    <h3><label class="label label-primary">Password</label></h3>
    <input name="Password" type="password" class="form-control" />
    <p class="badge text-info">The password must contain one special character, one uppercase letter, one lowercase letter, and one number at least, and also minimum of 8 characters</p>
</div>

<div class="btn-loading loading__" style="display: none;">
    <h4>Saving data...</h4>
    <img alt="loading" style="display: inline; " src="<?php echo BASE_PATH; ?>public/images/ajax-loader.gif" />
</div>

<div class="form-group">
    <input type="submit" class="make-user buttom-lmo btn-lmo" value="Submit" />
</div>

</fieldset>
</form>
