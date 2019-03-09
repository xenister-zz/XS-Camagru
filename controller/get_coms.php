<?php

require('/app/model/get_coms.php');

$getComs = new GetComs();

$getComs->ret($_GET['action']);
