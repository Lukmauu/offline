
<div class="page-header">
    <h1>
        Welcome <?php echo ucfirst( Session::get( "UserName" ) ); ?>, here you can manage your users.
    </h1>
</div>




<div class="row">

    <div class="col-xs-12">
        <h2>Add new user</h2>
        <small>Please fill out that form to register</small>
    </div>
    

<a href="#" tabindex="-1" id="toTop"></a>

<form class="form-horizontal col-xs-7" action="register/makeUser" method="POST" name="form-register">

    <div class="error-msg__">
        
    </div>

<fieldset>


<!-- Text input-->
<div class="form-group">
    <h3><label class="label label-primary" for="FirstName">First Name</label></h3>
    <input name="FirstName" type="text" placeholder="First name" class="form-control" />
</div>

<!-- Text input-->
<div class="form-group">
    <h3><label class="label label-primary" for="LastName">Last Name</label></h3>
    <input name="LastName" type="text" placeholder="Last name" class="form-control" />
</div>

<!-- Text input-->
<div class="form-group">
    <h3><label class="label label-primary" for="UserName">User Name</label></h3>
    <input name="UserName" type="text" placeholder="User name" class="form-control" />
</div>

<!-- Text input-->
<div class="form-group">
    <h3><label class="label label-primary" for="Email">Email</label></h3>
    <input name="Email" type="email" placeholder="youremail@email.com" class="form-control" />
</div>

<!-- Password input-->
<div class="form-group">
    <h3><label class="label label-primary" for="Password">Password</label></h3>
    <input name="Password" type="password" placeholder="password" class="form-control" />
</div>

<div class="btn-loading loading__" style="display: none;">
    <h4>Saving data...</h4>
    <img style="display: inline; " src="<?php echo BASE_PATH; ?>public/images/ajax-loader.gif" />
</div>

<div class="form-group">
    <input type="submit" class="make-user buttom-lmo btn-lmo" value="Submit" />
</div>

</fieldset>
</form>


</div>

<?php foreach ( $this->users as $key => $value) { ?>

<div class="container-fluid">
    <div class="row center-block">
        <div class="col-xs-6 panel">
            <h4><?php echo $value['UserName']; ?></h4>
            <p>Name of Submitter :&nbsp;<small><?php  ?></small>&nbsp;&nbsp;Cooking time :&nbsp;<small>1h</small></p>
            <?php echo '<span class="badge">' . $value['Email'] . '</span>'; ?>
        </div>
        
        <div class="col-xs-4">
            <ul class="list-inline">
                <li class="list-group-item-text"><a class="edit_dashboard btn-lmo buttom-lmo" href="admin/editUser/<?php echo $value['UserID']; ?>" rel="<?php echo $value['UserID']; ?>">EDIT</a></li>
                <li class="list-group-item-text"><a class="delete_dashboard btn-lmo buttom-lmo" href="admin/blockUser/<?php echo $value['UserID']; ?>" rel="<?php echo $value['UserID']; ?>">BLOCK</a></li>
                <li class="list-group-item-text"><a class="delete_dashboard btn-lmo buttom-lmo btn-danger" href="admin/deleteUser/<?php echo $value['UserID']; ?>" rel="<?php echo $value['UserID']; ?>">DELETE</a></li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>
