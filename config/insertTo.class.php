<?php
/**
 * Created by PhpStorm.
 * User: phenicien
 * Date: 24/10/2018
 * Time: 09:05
 */

class insert Extends Database
{
    public function Into($table, $arr_col, $arr_val) {
        $this->dbh->exec();
    }
}
