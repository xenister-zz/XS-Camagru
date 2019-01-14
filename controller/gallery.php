<?php
/**
 * User: abbenham
 * Date: 14/01/2019
 * Time: 14:46
 */
require('/app/model/gallery.php');

$gallery = new Gallery();

$gallery->getImages();

