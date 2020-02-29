<?php
    $dir = "./";

    if(is_dir($dir)) {
        if($diropen = opendir($dir)) {
            while($fileread = readdir($diropen)) {
                if(strpos($fileread, ".mp3") || strpos($fileread, ".zip") || strpos($fileread, ".7z") || is_dir($fileread)) {
                    $fileread_url = rawurlencode($fileread);
                    if(strcmp($fileread, ".") && strcmp($fileread, "..")) {
                        if(is_dir($fileread))
                            echo "<a href='mp3_2.php?dirname={$fileread_url}'>{$fileread}</a><br><br>";
                        else
                            echo "<a href={$fileread_url} download>{$fileread}</a><br><br>";
                    }
                    
                }
            }
        }
    }

    closedir($diropen);
?>