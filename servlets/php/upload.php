<?php
    $source = $_FILES['profile']['tmp_name'];
    $dest = "./".basename($_FILES['profile']['tmp_name']);
    move_uploaded_file($source, $dest);
?>
<html>

<head>
</head>

<body>
    <script>
        location.href = "./";

    </script>
</body>

</html>
