<?php
/**
 * User: abbenham
 * Date: 23/12/2018
 * Time: 20:07
 */

require('/app/model/save.php');

$save = new Save();

$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);

if (!$_SESSION['login']) {
    //MUST LOGIN!!!
    echo 'Must login First';
} else {
    $save->saveImage($fileData);
}


