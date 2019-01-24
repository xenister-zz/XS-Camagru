<?php

echo "OOOOOOOOOOOOO";
phpinfo();

require('/app/model/register.php');
require(__ROOT__ . 'view/validation.php');

if (isset($_GET['user'])){
    echo $_GET['user'];
    echo $_GET['token'];
}

?>


