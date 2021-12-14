<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__."/minify.php"; 

use marko9827\minify\Minify as MinifyMinify;

$minify = new MinifyMinify("./test/test.css"); // "body { display: flex; }");
echo $minify;
?>