<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>php7.2-apache</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php phpinfo(); ?>
<?php
require_once 'Zend/Version.php';
echo 'Hello, Zend Framework! Ver ' . Zend_Version::VERSION;
?>
</body>
</html>