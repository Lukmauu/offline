<?php
    if ( $this->errorFlag )
    {
?>   

<div class="container">
    <div class="row">
        <div class="jumbotron col-sm-6">
            <h2 class="text-center"><?php echo $this->msg; ?></h2>

            <div  class="text-center"><a class="btn-lmo buttom-lmo">Back Home</a></div>
        </div>
    </div>
</div>


<?php
    // Important here: if there is a error exit;;
    exit;
    }
?>
<div class="page-header">
    <h1>Please submit your recipe</h1>
</div>

<a href="#" tabindex="-1" id="toTop"></a>

<form id="add-recipes-form" class="form-horizontal col-md-9" method="post" 
      action="<?php echo $this->action; ?>">
    <fieldset class="container">

        <div class="error-msg__ row" style="display: none;"></div>
        <div class="form-group">
            <input class="btn-lmo buttom-lmo submit-add-recipes-form" type="submit" value="SAVE DATA" />
        </div>
        
        <div class="loading__" style="display: none;">
            <h4>Saving Data...</h4>
            <img alt="loading" style="display: inline; " src="<?php $this->friendlyUrl( 'public/images/ajax-loader.gif' ); ?>" />
        </div>
            
        <div class="form-group">
            <div class="col-sm-9 padding-left">
                <label class="control-label lead">Recipe Name</label>
                <input class="form-control input-sm" type="text" name="RecipeName" value="<?php $this->displayValue('RecipeName', false); ?>" />
                <p class="help-block"></p>
            </div>
            <div class="col-sm-3 padding-right">
                <div class="panel panel-default alert alert-warning">
                    <h4><span class="glyphicon glyphicon-info-sign"></span>   recipe name :</h4>
                    <p>Keep it short</p>
                    <p>Include the name of the fish or its main ingredients</p>
                    <p>Add a personal touch/get creative</p>
                </div>
            </div>
        </div>

        <h4 class="panel panel-default alert alert-warning row">
            Please insert amounts on the beginning of the line and the ingredients after. <br />
          Also make sure to insert a ingredient for each line or your recipe will not display proper.<!--  <br />-->
<!--            Amounts are numeric, and if you have ("salt as taste") that does not have numeric add at last line.-->
        </h4>
        <div class="form-group ingredients__">
            <div class="col-sm-9  padding-left">
                <label class="control-label lead">Ingredients</label>
                <textarea class="form-control input-sm col-sm-9" rows="7" cols="" name="Ingredients"><?php $this->displayValue('Ingredients', false); ?></textarea>
                <p class="bg-danger"></p>
            </div>
            
            <div class="col-sm-3 padding-right">
                <div class="panel panel-default alert alert-warning">
                    <h4><span class="glyphicon glyphicon-info-sign"></span>   Ingredients :</h4>
                    <p>Include amounts/measurements for each ingredient. (Note: Recipes that don’t have ingredient measurements can be erased from database.)</p>
                    <p>Indicate how each ingredient should be prepared. (Example: Is the cheese shedded? Is the basil fresh or dried )</p>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-9 padding-left">
                <label class="control-label lead">Instructions</label>
                <textarea class="form-control input-sm" rows="8" cols="" name="Instructions"><?php $this->displayValue('Instructions', false); ?></textarea>
                <p class="bg-danger"></p>
            </div>
            <div class="col-sm-3 padding-right">
                <div class="panel panel-default alert alert-warning">
                    <h4><span class="glyphicon glyphicon-info-sign"></span>   Instructions :</h4>
                    <p>List steps in the way they should be done in order to successfully make the dish.</p>
                    <p>Be specific, but keep it short.</p>
                    <p>Don't forget oven temp, and time for "waiting" steps such as marinating, dough-rising, etc.</p>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-9 padding-left">
                <div class='row'>
        
        <div class="col-xs-6">
            <label class="control-label lead">Prep Time </label>
            <input class="form-control input-sm prep" type="text" name="PrepTime" value="<?php $this->displayValue('PrepTime', false); ?>" />
            <p class="bg-danger"></p>
        </div>
        <div class="col-xs-6">
            <label class="control-label lead">Cook Time</label>
            <input class="form-control input-sm prep" type="text" name="CookTime" value="<?php $this->displayValue('CookTime', false); ?>" />
            <p class="bg-danger"></p>
        </div>
        
                </div>
            </div>
            <div class="col-sm-3 padding-right">
                <div class="panel panel-default alert alert-warning">
                    <h4><span class="glyphicon glyphicon-info-sign"></span>   Times :</h4>
                    <p><strong>Prep Time : </strong> How long it takes to do everything but cook/bake the dish.</p>
                    <p><strong>Cook Time : </strong> How long it takes for the dish to bake, cook, grill, etc.</p>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-9 padding-left">
                <label class="control-label lead">Notes  (<small class="text-info">* optional</small>)</label>
                <textarea class="form-control input-sm" rows="5" cols="" name="Notes"><?php $this->displayValue('Notes', false); ?></textarea>
                <p class="bg-danger"></p>
            </div>
            <div class="col-sm-3 padding-right">
                <div class="panel panel-default alert alert-warning">
                    <h4><span class="glyphicon glyphicon-info-sign"></span>   Notes :</h4>
                    <p>Include info about other ways to cook or server this dish</p>
                    <p>Add tips for ingredients substitutions.</p>
                    <p>Don't add info that describes the recipe - that goes best in the Instructions field.</p>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-9 padding-left">
                <label class="control-label lead">Keywords</label>
                <input class="form-control input-sm" type="text" name="Keywords" value="<?php $this->displayValue('Keywords', false); ?>" />
                <p class="help-block"></p>
            </div>
            <div class="col-sm-3 padding-right">
                <div class="panel panel-default alert alert-warning">
                    <h4><span class="glyphicon glyphicon-info-sign"></span>   Keywords :</h4>
                    <p>At least 3 keywords that best describe this dish.</p> 
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <input class="btn-lmo buttom-lmo submit-add-recipes-form" type="submit" value="SAVE DATA" />
        </div>
        
        <div class="loading__" style="display: none;">
            <h4>Saving Data...</h4>
            <img alt="loading" style="display: inline; " src="<?php $this->friendlyUrl( 'public/images/ajax-loader.gif' ); ?>" />
        </div>
    </fieldset>
</form>
