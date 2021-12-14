<?php

namespace marko9827\minify;
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
    function __construct()
    {
    }
    function isCode($string_or_file)
    {
        $this->setString_or_file($string_or_file);
        if (file_exists($string_or_file)) {
        }
        return $this->getReturn();
    }

    function fileScann()
    {
        $this->setExt(pathinfo($this->getString_or_file(), PATHINFO_EXTENSION));

        if ($this->getExt() == "css") {
        }
        if ($this->getExt() == "js") {
        }
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
