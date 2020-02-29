<?php
    $_dirname = $_GET['dirname'];

    if($_diropen = opendir('./'.$_dirname)) {
        while($_fileread = readdir($_diropen)) {
            if(strcmp($_fileread, '.') && strcmp($_fileread, '..')) {
                $_fileread_url = rawurlencode($_fileread);
                echo "<a href={$_dirname}/{$_fileread_url} download>{$_fileread}</a><br><br>";
            }
        }
    }

    closedir($_diropen);
?>