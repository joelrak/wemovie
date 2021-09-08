<?php

namespace App\Model;

class MovieResponse
{
    protected bool $adult;
    protected string|null $backdrop_path;
    protected object $belongsToCollection;
    protected int $budget;
    protected array $genres;
    protected string|null $homepage;
    protected int $id;
    protected string|null $imdbId;
    protected string $originalLanguage;
    protected string $originalTitle;
    protected string|null $overview;
    protected float $popularity;
    protected string|null $posterPath;
    protected array $productionCompanies;
    protected int $revenue;
    protected int|null $runtime;
    protected array $productionCountries;
    protected \Datetime $releaseDate;
    protected array $spokenLanguages;
    protected string $status;
    protected string|null $tagline;
    protected string $title;
    protected bool $video;
    protected float $voteAverage;
    protected int $voteCount;


    /**
     * Get the value of adult
     */ 
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * Set the value of adult
     *
     * @return  self
     */ 
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * Get the value of backdrop_path
     */ 
    public function getBackdrop_path()
    {
        return $this->backdrop_path;
    }

    /**
     * Set the value of backdrop_path
     *
     * @return  self
     */ 
    public function setBackdrop_path($backdrop_path)
    {
        $this->backdrop_path = $backdrop_path;

        return $this;
    }

    /**
     * Get the value of belongsToCollection
     */ 
    public function getBelongsToCollection()
    {
        return $this->belongsToCollection;
    }

    /**
     * Set the value of belongsToCollection
     *
     * @return  self
     */ 
    public function setBelongsToCollection($belongsToCollection)
    {
        $this->belongsToCollection = $belongsToCollection;

        return $this;
    }

    /**
     * Get the value of budget
     */ 
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set the value of budget
     *
     * @return  self
     */ 
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get the value of genres
     */ 
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Set the value of genres
     *
     * @return  self
     */ 
    public function setGenres($genres)
    {
        $this->genres = $genres;

        return $this;
    }

    /**
     * Get the value of homepage
     */ 
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set the value of homepage
     *
     * @return  self
     */ 
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of imdb_id
     */ 
    public function getImdb_id()
    {
        return $this->imdb_id;
    }

    /**
     * Set the value of imdb_id
     *
     * @return  self
     */ 
    public function setImdb_id($imdb_id)
    {
        $this->imdb_id = $imdb_id;

        return $this;
    }

    /**
     * Get the value of original_language
     */ 
    public function getOriginal_language()
    {
        return $this->original_language;
    }

    /**
     * Set the value of original_language
     *
     * @return  self
     */ 
    public function setOriginal_language($original_language)
    {
        $this->original_language = $original_language;

        return $this;
    }

    /**
     * Get the value of originalTitle
     */ 
    public function getOriginalTitle()
    {
        return $this->originalTitle;
    }

    /**
     * Set the value of originalTitle
     *
     * @return  self
     */ 
    public function setOriginalTitle($originalTitle)
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    /**
     * Get the value of overview
     */ 
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Set the value of overview
     *
     * @return  self
     */ 
    public function setOverview($overview)
    {
        $this->overview = $overview;

        return $this;
    }

    /**
     * Get the value of popularity
     */ 
    public function getPopularity()
    {
        return $this->popularity;
    }

    /**
     * Set the value of popularity
     *
     * @return  self
     */ 
    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;

        return $this;
    }

    /**
     * Get the value of posterPath
     */ 
    public function getPosterPath()
    {
        return $this->posterPath;
    }

    /**
     * Set the value of posterPath
     *
     * @return  self
     */ 
    public function setPosterPath($posterPath)
    {
        $this->posterPath = $posterPath;

        return $this;
    }

    /**
     * Get the value of productionCompanies
     */ 
    public function getProductionCompanies()
    {
        return $this->productionCompanies;
    }

    /**
     * Set the value of productionCompanies
     *
     * @return  self
     */ 
    public function setProductionCompanies($productionCompanies)
    {
        array_push($this->productionCompanies, $productionCompanies);

        return $this;
    }

    /**
     * Get the value of revenue
     */ 
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * Set the value of revenue
     *
     * @return  self
     */ 
    public function setRevenue($revenue)
    {
        $this->revenue = $revenue;

        return $this;
    }

    /**
     * Get the value of runtime
     */ 
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * Set the value of runtime
     *
     * @return  self
     */ 
    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;

        return $this;
    }

    /**
     * Get the value of productionCountries
     */ 
    public function getProductionCountries()
    {
        return $this->productionCountries;
    }

    /**
     * Set the value of productionCountries
     *
     * @return  self
     */ 
    public function setProductionCountries($productionCountries)
    {
        array_push($this->productionCountries, $productionCountries);

        return $this;
    }

    /**
     * Get the value of releaseDate
     */ 
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set the value of releaseDate
     *
     * @return  self
     */ 
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get the value of spokenLanguages
     */ 
    public function getSpokenLanguages()
    {
        return $this->spokenLanguages;
    }

    /**
     * Set the value of spokenLanguages
     *
     * @return  self
     */ 
    public function setSpokenLanguages($spokenLanguages)
    {
        array_push($this->spokenLanguages, $spokenLanguages);

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of tagline
     */ 
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * Set the value of tagline
     *
     * @return  self
     */ 
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of video
     */ 
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of video
     *
     * @return  self
     */ 
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get the value of voteAverage
     */ 
    public function getVoteAverage()
    {
        return $this->voteAverage;
    }

    /**
     * Set the value of voteAverage
     *
     * @return  self
     */ 
    public function setVoteAverage($voteAverage)
    {
        $this->voteAverage = $voteAverage;

        return $this;
    }

    /**
     * Get the value of voteCount
     */ 
    public function getVoteCount()
    {
        return $this->voteCount;
    }

    /**
     * Set the value of voteCount
     *
     * @return  self
     */ 
    public function setVoteCount($voteCount)
    {
        $this->voteCount = $voteCount;

        return $this;
    }
}