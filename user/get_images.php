<?php
$dir = "/assets/img/captcha/*.{jpg,jpeg,png,gif}";
$files = glob($dir,GLOB_BRACE);
echo json_encode($files);
?>
