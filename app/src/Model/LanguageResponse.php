<?php

namespace App\Model;

class LanguageResponse
{
    protected string $iso6391;
    protected string $name;

    /**
     * Get the value of iso6391
     */ 
    public function getIso6391()
    {
        return $this->iso6391;
    }

    /**
     * Set the value of iso6391
     *
     * @return  self
     */ 
    public function setIso6391($iso6391)
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}