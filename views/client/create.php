<?php

require_once 'header.php';

?>

<form action="client/create" method="post" class="form-horizontal col-sm-6">
    
    <div class="form-group">
        <label for="name" class="lead">Client name</label>
        <input name="name" type="text" placeholder="Client name" required class="form-control">
    </div>

    <div class="form-group">
        <label for="address_default" class="lead">Client name</label>
        <input name="address_default" type="text" placeholder="Client name" required class="form-control">
    </div>
    
    <div class="form-group">
        <label for="address_default" class="lead">Client name</label>
        <input name="address_default" type="text" placeholder="Client name" required class="form-control">
    </div>
    
    <div class="form-group">
        <label for="name_bill_to" class="lead">Client name</label>
        <input name="name_bill_to" type="text" placeholder="Client name" required class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary">Create client</button>
    
</form>

<?php

require_once 'footer.php';
