<?php 

include "./vendor/autoload.php";

use marko9827\minify;
 
 $content = file_get_contents("$path/file.example"); // .example = .js/.css/.html
 // or
 $content = "var a = 0;  return a + 2;"; //js example
 $content = "body { display: flex; }"; // css example
 $content = "... <body> <div id='example_div'><p>Html Example</p></div>  ..."; // html example

 $minify = new Minify($content);
 echo $minify;
 

?>