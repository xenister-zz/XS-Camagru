<?php
/**
 * Created by PhpStorm.
 * User: phenicien
 * Date: 12/01/2019
 * Time: 14:02
 */

require('/app/v1/mvc/model.php');

class Save extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function image ($val) {
        $sql = "";
        //print_r($val);
        //print_r(self::$bdd->exec($sql));
    }
}
?>
