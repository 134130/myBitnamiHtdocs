<?php
    header('Content-Type: text/html; charset=UTF-8');
    $handle = fopen("C:/Bitnami/wampstack-7.3.11-0/apache2/htdocs/servlets/php/href_list.txt", "a");
    fwrite($handle, $_GET['search']."\n");
    fclose($handle);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
</head>

<body>
    <script>
        location.href = '/';
    </script>
</body>

</html>