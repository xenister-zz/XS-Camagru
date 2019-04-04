<?php

require('/app/model/gallery.php');

$gallery = new Gallery();

//if ($_SERVER['REQUEST_URI'] == '/?page=user'){
//echo ($_SERVER['REQUEST_URI']);

if ($_GET['action'] == 'user_name') {
    $gallery->getUserName($_GET['id']);
} else if ($_GET['action'] == 'user_page') {
    $gallery->getUserPage();
} else if ($_GET['action'] == 'auth') {
    if (isset($_SESSION['login'])) {
        echo json_encode($_SESSION['login']);
    } else {
        echo json_encode("none");
    }
} else {
    $gallery->getImages();
}
//} elseif (isset($_SESSION['login'])) {
//
//}

