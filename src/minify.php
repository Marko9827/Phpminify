<?php

namespace marko9827\minify;

use Exception;

/*
 * Minify Class
 * @author Marko Nikolić <marko.supergun@gmail.com>
 * @copyright 2021 Marko
 * @license ../LICENCE.MD
 * @link https://github.com/Marko9827/Phpminify
 * @version 1.0.0
 */

class Minify
{
    private $type = true, $valid = false, $ext = "", $string_or_file = "", $return = "";
    public function __construct($str)
    {
        $this->setString_or_file($str);
    }
    public function __toString()
    {

        return $this->isCode();
    }
    function isCode()
    {
        $string_or_file = $this->getString_or_file();
        try {
            if (ini_get('zlib.output_compression')) {
                ini_set("zlib.output_compression", 1);
                ini_set("zlib.output_compression_level", "9");
            }
        } catch (Exception $e) {
        }
        if (file_exists($string_or_file)) {
            header("content-type: text/plain"); 
            $this->fileScann();
        } else if (!empty($string_or_file)) { 
            $this->isStrings($this->getString_or_file());
        } else {
            $this->setReturn(false);
        }
        return $this->getReturn();
    }

    function fileScann()
    {
        $this->setExt(pathinfo($this->getString_or_file(), PATHINFO_EXTENSION));

        if ($this->getExt() == "css") {
            $this->CSSM(file_get_contents($this->getString_or_file()));
        }
        if ($this->getExt() == "js") {
            $this->JSM(file_get_contents($this->getString_or_file()));
        } 
        if ($this->getExt() == "html") {
            $this->isHTML(file_get_contents($this->getString_or_file()));
        }
    }
    function isStrings($content)
    {
    }
    function isHTML($content)
    {
        return preg_match('/<(\/*?)(?!(em|p|br\s*\/|strong))\w+?.+?>/', $content) ? true : false;
    }
    function HTMLM($buffer)
    {
        if ($this->isHTML($buffer)) {
            $pattern = "/<script[^>]*>(.*?)<\/script>/is";
            preg_match_all($pattern, $buffer, $matches, PREG_SET_ORDER, 0);
            foreach ($matches as $match) {
                $pattern = "/(<script[^>]*>)(" . preg_quote($match[1], '/') . ")(<\/script>)/is";
                $compress = $this->JSM($match[1]);
                $buffer = preg_replace($pattern, '$1' . $compress . '$3', $buffer);
            }
            $pattern = "/<style[^>]*>(.*?)<\/style>/is";
            preg_match_all($pattern, $buffer, $matches, PREG_SET_ORDER, 0);
            foreach ($matches as $match) {
                $pattern = "/(<style[^>]*>)(" . preg_quote($match[1], '/') . ")(<\/style>)/is";
                $compress = $this->CSSM($match[1]);
                $buffer = preg_replace($pattern, '$1' . $compress . '$3', $buffer);
            }
            $buffer = preg_replace(array('/<!--[^\[](.*)[^\]]-->/Uuis', "/[[:blank:]]+/u", '/\s+/u'), array('', ' ', ' '), str_replace(array("\n", "\r", "\t"), '', $buffer));
        }
        return $buffer;
    }
    function JSM($content)
    {
        $this->setReturn(str_replace(array("\n", "\r", "\t"), '', preg_replace(array('#\/\*[\s\S]*?\*\/|([^:]|^)\/\/.*$#m', '/\s+/'), array('', ' '), $content)));
    }
    function CSSM($content)
    {
        $this->setReturn(preg_replace('/(\/\*[\s\S]*?\*\/)|([\t\r\n])/', "", $content));
    }

    /**
     * Get the value of valid
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set the value of valid
     *
     * @return  self
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get the value of string_or_file
     */
    public function getString_or_file()
    {
        return $this->string_or_file;
    }

    /**
     * Set the value of string_or_file
     *
     * @return  self
     */
    public function setString_or_file($string_or_file)
    {
        $this->string_or_file = $string_or_file;

        return $this;
    }

    /**
     * Get the value of ext
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * Set the value of ext
     *
     * @return  self
     */
    public function setExt($ext)
    {
        $this->ext = $ext;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of return
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * Set the value of return
     *
     * @return  self
     */
    public function setReturn($return)
    {
        $this->return = $return;

        return $this;
    }
}
