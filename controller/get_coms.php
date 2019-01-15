<?php
/**
 * User: abbenham
 * Date: 15/01/2019
 * Time: 16:48
 */

require('/app/model/get_coms.php');

$getComs = new GetComs();


$getComs->ret($_GET['action']);
