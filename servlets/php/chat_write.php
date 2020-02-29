<?php
    require_once("../../dbconfig.php");

        error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $c_content = $_POST['c_content'];
    $c_writer = $_POST['c_writer'];

    $sql = 'insert into chat values(null, "'. $c_content .'", "'. $c_writer .'", now())';

    $result = $db->query($sql);
    if($result) {
        $replaceURL = '/chat.html';
    }
?>
