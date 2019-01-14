<?php
/**
 * User: abbenham
 * Date: 14/01/2019
 * Time: 14:46
 */
require('/app/model/gallery.php');

$gallery = new Gallery();

if ($_GET['action'] == 'user_name') {
    $gallery->getUserName($_GET['id']);
} else {
    $gallery->getImages();
}

