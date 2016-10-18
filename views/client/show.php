<?php

require_once 'header.php';

$user = $sender;

?>

<div><p><?php $user['name'] ?></p></div>

<div><p><?php $user['address_default'] ?></p></div>
<div><p><?php $user['address_bill_to'] ?></p></div>
<div><p><?php $user['name_bill_to'] ?></p></div>

<?php
foreach ($user['services'] as $key => $value)
{
    echo '<p>';
    foreach ($value as $key => $value_inside)
    {
        echo $value_inside . '    ';
    }
    echo '</p>';
}

?>

<?php
require_once 'footer.php';
