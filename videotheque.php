<?php

require 'base/config.php';

$query = 'SELECT * FROM film';

$result = requeteResultat($query);

echo json_encode($result);

?>