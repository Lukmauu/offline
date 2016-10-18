<?php

$recipe = $this->recipe;

if ( !$recipe )
{
?>   

    <div class="container">
        <div class="row">
            <div class="jumbotron col-sm-6 col-sm-offset-3">
                <div class="page-header text-center text-warning">
                    <h2><?php echo $this->msg; ?></h2>
                </div>
                <div  class="text-center"><a href="<?php echo BASE_PATH; ?>" class="btn-lmo buttom-lmo">Back Home</a></div>
            </div>
        </div>
    </div>

<?php
// IMPORTANT =>if there is a error exit;
exit;
}
else
{
    // ELSE => recipe is not false we have recipe, or recipes
    
    if ( isset( $recipe[0] ) && isset( $recipe[1] ) )
    {
        $this->tool->displayManyRecipeDetail( $recipe );
    }
    else 
    {
        if ( is_array( $recipe ) ) 
        {
            $intructions = $this->tool->choppeStringInLine( $recipe['Instructions'] );
            $ingredients = $this->tool->choppeStringInLine( $recipe['Ingredients'] ); 
              
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-7">
            <h1><?php echo ucwords( $this->tool->underscoreOut( $recipe['RecipeName'] ) ); ?></h1>
            <p class="small">Submitted by: <?php echo ucfirst( $recipe['SubmitterName'] ); ?></p>
            <p class="small">on: <?php echo $this->tool->break_date( $recipe['Date'] ); ?></p>
            <div class="clearfix"></div>
            <div class="col-xs-5">
                <h2>Ingredients</h2>
                <ul class="list-group">
                    
                <?php for ( $i = 0; $i < count( $ingredients ); $i++ ) 
                    { 
                        echo '<li class="list-group-item-heading">';
                            echo $ingredients[$i];
                        echo '</li>';
                    } 
                ?>

                </ul>
            </div>
            <div class="col-xs-7">
                <h2>Cooking Instructions</h2>
                <ul class="list-group list-unstyled">
                    <?php for ( $i = 0; $i < count( $intructions ); $i++ ) 
                    { 
                    echo '<li class="list-group-item-heading"><span class="badge">' . ($i + 1) . '.</span><span class="item">' . $intructions[$i] . '</span></li>';
                    } 
                    ?>
                </ul>
                    
            </div>
            <div class="row print-this-page">
                <a class="btn-lmo buttom-lmo" style="float: right" href="javascript:window.print()">Print this page</a>
    <?php if ( Session::get("Role") === "member" && strtolower( Session::get("UserName") ) === strtolower( $recipe['SubmitterName'] ) ) { ?>
                <a class="btn-lmo buttom-lmo" style="float: right; margin-right: 0.7em;" href="<?php echo BASE_PATH; ?>dashboard/editRecipe/<?php echo $recipe['RecipeID']; ?>">Edit Recipe</a>
    <?php } ?>
    
</div>

        </div>
    </div>
</div>

<?php 
    // Close the foreach, and the else statement.
        }
    }
    // Close the foreach, and the else statement.
} // Close the first else statement.
  