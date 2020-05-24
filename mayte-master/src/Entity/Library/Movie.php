<?php


namespace App\Entity\Library;


class Movie
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $rated;

    /**
     * @var \DateTime|null
     */
    private $released;

    /**
     * @var int|null
     */
    private $runtime;

    /**
     * @var string|null
     */
    private $genre;

    /**
     * @var string|null
     */
    private $director;

    /**
     * @var string|null
     */
    private $writer;

    /**
     * @var string|null
     */
    private $actors;

    /**
     * @var string|null
     */
    private $plot;

    /**
     * @var string|null
     */
    private $language;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var string|null
     */
    private $awards;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getRated(): ?string
    {
        return $this->rated;
    }

    /**
     * @param string|null $rated
     */
    public function setRated(?string $rated): void
    {
        $this->rated = $rated;
    }

    /**
     * @return \DateTime|null
     */
    public function getReleased(): ?\DateTime
    {
        return $this->released;
    }

    /**
     * @param \DateTime|null $released
     */
    public function setReleased(?\DateTime $released): void
    {
        $this->released = $released;
    }

    /**
     * @return int|null
     */
    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    /**
     * @param int|null $runtime
     */
    public function setRuntime(?int $runtime): void
    {
        $this->runtime = $runtime;
    }

    /**
     * @return string|null
     */
    public function getGenre(): ?string
    {
        return $this->genre;
    }

    /**
     * @param string|null $genre
     */
    public function setGenre(?string $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return string|null
     */
    public function getDirector(): ?string
    {
        return $this->director;
    }

    /**
     * @param string|null $director
     */
    public function setDirector(?string $director): void
    {
        $this->director = $director;
    }

    /**
     * @return string|null
     */
    public function getWriter(): ?string
    {
        return $this->writer;
    }

    /**
     * @param string|null $writer
     */
    public function setWriter(?string $writer): void
    {
        $this->writer = $writer;
    }

    /**
     * @return string|null
     */
    public function getActors(): ?string
    {
        return $this->actors;
    }

    /**
     * @param string|null $actors
     */
    public function setActors(?string $actors): void
    {
        $this->actors = $actors;
    }

    /**
     * @return string|null
     */
    public function getPlot(): ?string
    {
        return $this->plot;
    }

    /**
     * @param string|null $plot
     */
    public function setPlot(?string $plot): void
    {
        $this->plot = $plot;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string|null
     */
    public function getAwards(): ?string
    {
        return $this->awards;
    }

    /**
     * @param string|null $awards
     */
    public function setAwards(?string $awards): void
    {
        $this->awards = $awards;
    }

}