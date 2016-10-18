<div class="page-header">
    <h1>
        Welcome <?php echo ucfirst( Session::get( "UserName" ) ); ?>, here you can manage your recipes.
    </h1>
</div>

<?php
if ( !$this->recipes )
{
?>   

    <div class="container">
        <div class="row">
            <div class="jumbotron col-sm-6 col-sm-offset-3">
                <div class="page-header text-center text-warning">
                    <h2><?php echo $this->msg; ?></h2>
                </div>
                <div  class="text-center">
    <a href="<?php echo BASE_PATH; ?>" class="btn-lmo buttom-lmo">Back Home</a>
    <a style="margin-left: 0.6em;" href="<?php echo BASE_PATH; ?>dashboard/addRecipe" class="btn-lmo buttom-lmo">Add Recipe</a>
                </div>
            </div>
        </div>
    </div>

<?php
// IMPORTANT =>if there is a error exit;
exit;
}
?>
<div class="container">
<?php echo $this->recipes; ?>
</div>