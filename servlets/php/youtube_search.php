<?php
    /*header('Content-Type: text/html; charset=utf-8');*/
    //print "C:/Bitnami/wampstack-7.3.11-0/apache2/htdocs/servlets/php/youtubeAPI.py ".$_GET['search'];
    $python = "C:/Users/134130/AppData/Local/Programs/Python/Python38-32/python.exe";
    
    echo $_GET['search']."<br>";
    $_GET['search'] = urlencode($_GET['search']);
    echo $_GET['search']."<br>";
    exec($python." ./youtubeAPI.py ".$_GET['search']." 2>&1", $output, $return);
    /*echo '<br>';
    echo print_r($output);
    echo '<br>';
    echo '<p>return:'.$return.':</p>';*/
    //print_r($output);
    //echo '<br>'
    echo print_r($output)."<br>";
    echo $return."<br>";
    
    $handle = fopen('./youtube_list.txt', 'r');
?>

<!DOCTYPE html>
<html>

<head>
    <!--<meta charset="utf-8">-->
    <style>
        div .wrapper {
            display: table;
            float: left;
            margin-bottom: 10px;
        }

        div .text {
            height: 72px;
            display: table-cell;
            vertical-align: middle;
            background-color: antiquewhite;
        }
        
        img {
            float: left;
        }
        
        a {
            margin: 0px 10px 0px 10px;
        }
        
        p {
            height: 10ps;
            width: 500px;
            background-color: aqua;
        }

    </style>
</head>

<body>
    <?php
        while(!feof($handle)) {
            $line = fgets($handle);
            $href = fgets($handle);
            $href = preg_replace('/\r|\n/', '', $href);
    ?>
    <div class="wrapper">
        <img width="128" height="72" src="https://img.youtube.com/vi/<?php echo $href?>/0.jpg" frameborder="0" allowfullscreen />
        <div class="text <?php echo $href?>">
            <a href=./mp3_download.php?search=<?php echo $href; ?>> <?php echo $line; ?> </a> <br>
        </div>
        <p></p>
    </div>
    <?php
        }
    ?>
</body>

</html>
<?php
    fclose($handle);
?>
