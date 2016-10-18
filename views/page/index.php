<?php

if ( intval( $this->pag->total_results ) === 0 )
{
    echo "<div class='text-center alert alert-warning'><h2 class='text-warning'>No results were found for this search, please try again!</h2></div>";
    exit;
}

echo '<div class="row container-page">';


/*
* Echo out the total number of results
*/
echo '<div class="row"><h4 class="col-sm-3">Total Results: <span class="label label-warning">'.$this->pag->total_results.'</span></h4>';    


/*
* Echo out the total number of pages
*/
echo '<h4 class="col-sm-3">Total Pages: <span class="label label-warning">' . $this->pag->total_pages . '</span></h4></div>';


?>
        <table id="search-table" class="table table-responsive table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="nope">
                    <th>Recipe Name</th>
                    <th>Submitter Name</th>
                    <th>Date</th>
                    <th>Keywords</th>
                </tr>
            </thead>
        <tbody id="myTable">

<?php
    
$html = '';
foreach( $this->pag->result as $value )
{
    $html .= '<tr><td>'
          . '<a href="' . BASE_PATH . 'recipe/' . $this->tool->underscoreIn( $value['RecipeName'] ) . '/' . $value['RecipeID'] . '">' 
          . $value['RecipeName'] . '</a></td><td>' 
          . $value['SubmitterName'] . '</td><td>' . '( ' . $this->tool->fix_date( $value['Date'] ) . ' )' . '</td><td>'
          . $value['Keywords'] . '</td></tr>';
}
echo $html;
?>
        </tbody>
    <tfoot>
        <tr class="nope">
            <th>Recipe Name</th>
            <th>Submitter Name</th>
            <th>Date</th>
            <th>Keywords</th>
        </tr>
    </tfoot>
</table>

</div>

<?php
/*
* Echo out the UL with the page links
*/
echo "<div class='text-center'>" . $this->pag->links_html . "</div>";
