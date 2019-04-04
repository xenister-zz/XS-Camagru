<?php

require('/app/model/like.php');

$like = new Like();

if ($_GET['action'] == 'toggle') {
    $like->toggleLike($_GET['img_id']);
} else if ($_GET['action'] == 'get_like') {
    $like->getLike($_GET['img_id']);
}

?>
