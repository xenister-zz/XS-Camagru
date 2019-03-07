<?php

require('/app/model/gallery.php');

$gallery = new Gallery();

if ($_GET['action'] == 'user_name') {
    $gallery->getUserName($_GET['id']);
} else {
    $gallery->getImages();
}

