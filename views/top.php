<!--<div class="navbar navbar-inverse navbar-fixed-top" style="display: none;" >-->
    <div class="navbar navbar-inverse navbar-top">
    <div class="container">
        <div class="navbar-header">
            
            <button 
                type="button" 
                class="navbar-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">All Taste Good</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo BASE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo BASE_PATH; ?>search">Detail Search</a></li>
                <li><a href="<?php echo BASE_PATH; ?>dashboard">Dashboard</a></li>
                <li><a href="<?php echo BASE_PATH; ?>dashboard/addRecipe">Add Recipes</a></li>
            </ul>
            <ul class="navbar-right list-inline">
               
                <?php $this->createUserHtml(); ?>
                    
            </ul>
        </div>
    </div>
</div>
<!--  data-toggle="collapse" 
                data-target=".navbar-collapse"-->