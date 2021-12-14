# Phpminify

Minify JS, CSS, HTML string or file.

> Very simple. Use this code.
# Composer
1. Install composer
2. Type ``` composer require marko9827/minify ```
3. Enjoy

# Usage
```php 
 use marko9827/minify;
 
 $content = file_get_contents("$path/file.example"); // .example = .js/.css/.html
 // or
 $content = "var a = 0;  return a + 2;"; //js example
 $content = "body { display: flex; }"; // css example
 $content = "... <body> <div id='example_div'><p>Html Example</p></div>  ..."; // html example

 $minify = new Minify($content);
 echo $minify;
 // or
 echo new Minify($content);
```

Return minified content

> Valid file extensions or MimeTypes

| Extension | MimeType |
|  --- | --- |
| js / json | text/javascript |
| js / json | application/javascript  |
| css | text/style  |
| css | text/css  |
| html | text/html |


