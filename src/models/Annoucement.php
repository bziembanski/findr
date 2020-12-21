<?php


class Annoucement
{
    private string $username;
    private string $date;
    private string $gameName;
    private string $description;

    public function __construct(string $username, string $date, string $gameName, string $description)
    {
        $this->username = $username;
        $this->date = $date;
        $this->gameName = $gameName;
        $this->description = $description;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getGameName(): string
    {
        return $this->gameName;
    }

    public function setGameName(string $gameName): void
    {
        $this->gameName = $gameName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}