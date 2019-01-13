<?php
/**
 * User: abbenham
 * Date: 12/01/2019
 * Time: 14:02
 */

require('/app/mvc/model.php');

class Save extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function saveImage ($fileData) {
        $rand = $this->generateRandomString(16) . '.png';
        $fileName = '../img/' . $rand;
        while (file_exists($fileName)) {
            $rand = $this->generateRandomString(16) . '.png';
            $fileName = '../img/' . $rand;
        }

        file_put_contents($fileName, $fileData);
        $id = $this->randomId();
        while ($this->exists('image', 'img_id' ,$id)) {
            $id = $this->randomId();
        }

        $sql = "INSERT INTO `image` (img_id, user_id, `file`) VALUES (" . $id . ","  . $_SESSION['user_id'] . ", '" . $rand . "');";
        echo $sql;
        self::$bdd->exec($sql);
        /*
        */
    }
}
?>
