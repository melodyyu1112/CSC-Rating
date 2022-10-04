<?php
session_start();
session_destroy();

 
echo "<script>alert('您已登出!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>"; 



?>

<html>
<head>
    <link rel="stylesheet" href="bootstrap.css">
</head>
</html>
