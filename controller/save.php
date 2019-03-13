<?php
/**
 * User: abbenham
 * Date: 23/12/2018
 * Time: 20:07
 */

require('/app/model/save.php');

if ($_GET['action'] == 'delete') {
    $save = new Save();
    $save->deleteImage($_GET['img_id']);

} else if ($_POST['src']) {

    ob_clean();
    $img = $_POST['src'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $img = base64_decode($img);
    $src = imagecreatefromstring($img);
    if ($_POST['filter']) {
        $img = $_POST['filter'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $img = base64_decode($img);
        $filter = imagecreatefromstring($img);
        imagecopymerge($src, $filter, 0, 0, 0, 0, 500, 375, 100);
    }
    ob_start();
    imagepng($src);
    $imagestr = ob_get_clean();
    echo 'data:image/png;base64,'.base64_encode($imagestr);
} else {

    $save = new Save();

    $img = $_POST['img'];
    echo("le titre est :" . $_POST['title']);
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $fileData = base64_decode($img);

    if (!$_SESSION['login'] || ($_SESSION['access_lvl'] < 1)) {
        //MUST LOGIN!!!
        echo 'Must login First';
    } else {
        $save->saveImage($fileData);
    }
}


