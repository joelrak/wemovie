<?php

namespace App\Model;

class CountryResponse
{
    /**
     * @var string $iso31661
     */
    protected $iso31661;
    /**
     * @var string $name
     */
    protected $name;
    

    /**
     * Get $iso31661
     *
     * @return  string
     */ 
    public function getIso31661()
    {
        return $this->iso31661;
    }

    /**
     * Set $iso31661
     *
     * @param  string  $iso31661  $iso31661
     *
     * @return  self
     */ 
    public function setIso31661(string $iso31661):self
    {
        $this->iso31661 = $iso31661;

        return $this;
    }

    /**
     * Get $name
     *
     * @return  string
     */ 
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Set $name
     *
     * @param  string  $name  $name
     *
     * @return  self
     */ 
    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }
}