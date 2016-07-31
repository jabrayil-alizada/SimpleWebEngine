<?php
//head settings
$site_title = 'SimpleWebEngine - развлекательный портал';
$site_charset = 'utf-8';
$site_css = "<link rel='stylesheet' type='text/css' href='css/index.css'>";
$site_fonts = "<link href='https://fonts.googleapis.com/css?family=PT+Sans&subset=cyrillic,latin' rel='stylesheet' type='text/css'>";

echo "<title>".$site_title."</title>";
echo "<meta charset='".$site_charset."'>";
echo $site_css;
echo $site_fonts;

?>