<?php
    $db = new mysqli('134130.iptime.org:3306', 'admin', '112233', 'website');

    if($db->connect_error) {
        die('Database Error, Please contact to Admin.');
    }

    $db->set_charset('utf8');
?>
