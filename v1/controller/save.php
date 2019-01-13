<?php
/**
 * User: abbenham
 * Date: 23/12/2018
 * Time: 20:07
 */

require('/app/v1/model/save.php');

$save = new Save();


$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);

$save->saveImage($fileData);


