<div class="container">

    <div class="page-header">
        <h1>User Login</h1>
    </div>
    
    <!-- ERROR MSG -->
       <h4 class="error-msg__" style="display: none;"></h4>
    <!-- ERROR MSG --> 
    
    <form id="login-form" class="form-horizontal" action="<?php 
        
        if ( isset( $this->loginAction ) )
        {
            echo BASE_PATH . $this->loginAction . '/Run';
        }
        else
        {
            echo BASE_PATH . 'login/Run';
        }
        
    ?>" method="post" style="padding: 1.5em;">
        <div class="form-group">
            <label class="label lead col-sm-2">User name</label>
            <div class="col-sm-8">
                <input class="user-name col-sm-7 form-control input-sm" type="text" name="UserName" />
                <p class="error-msg"></p>    
            </div>
        </div>

        <div class="form-group">
            <label class="label lead col-sm-2">Password</label>
            <div class="col-sm-8">
                <input class="form-control input-sm" type="password" name="Password" />
                <p class="error-msg"></p>
            </div>
        </div>
        
        <input type="hidden" name="Role" value="<?php 
            if ( isset( $this->role ) ) 
            { 
                echo $this->role; 
            }
            else
            {
                echo 'member';
            }
        ?>" />
        
        <input id="mainSubmitButtom" class="btn-lmo buttom-lmo" type="submit" value="SUBMIT" />
        <div class="btn-loading loading__" style="display: none;">
            <h4>Logging...</h4>
            <img alt="loading" src="<?php echo BASE_PATH; ?>public/images/ajax-loader.gif" style="display: inline;" />
        </div>
    </form>
    <div style="display: none;" class="__redirect"><?php 
            if ( !$this->redirect ) 
            {
                echo 'dashboard';
            }
            else
            {
                echo $this->redirect;
            }
    ?></div>
</div>


