<?php
    include_once './mysql.php';
    $a = array('dbName' => 'php');
    $x = new Mysql($a);
    // $sql = "INSERT INTO `php1`(`id`, `name`) VALUES (2,'test2')";
    // $result = $x->exec($sql);
    // echo $result;
    // echo '<br/>';
    $sql = "SELECT * FROM `php1` WHERE 1";
    $result = $x->query($sql);
    print_r($result);
    foreach($result as $row)
    {
            echo json_encode($row);
    }
?>