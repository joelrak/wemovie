<?php

namespace App\Model;

class CompanyResponse
{
    /**
     * @var int $id
     */
    protected int $id;
    /**
     * @var string $name
     */
    protected string $name;
    /**
     * @var string $logoPath
     */
    protected string $logoPath;
    /**
     * @var string $originCountry
     */
    protected string $originCountry;

    

    /**
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param  int  $id 
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }

    /**
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }

    /**
     *
     * @return  string
     */ 
    public function getLogoPath()
    {
        return $this->logoPath;
    }

    /**
     *
     * @param  string  $logoPath 
     *
     * @return  self
     */ 
    public function setLogoPath(string $logoPath):self
    {
        $this->logoPath = $logoPath;

        return $this;
    }

    /**
     *
     * @return  string
     */ 
    public function getOriginCountry()
    {
        return $this->originCountry;
    }

    /**
     *
     * @param  string  $originCountry
     *
     * @return  self
     */ 
    public function setOriginCountry(string $originCountry):self
    {
        $this->originCountry = $originCountry;

        return $this;
    }
}