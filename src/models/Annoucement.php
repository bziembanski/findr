<?php


class Annoucement
{
    private string $username;
    private string $avatar;
    private string $date;
    private string $time;
    private string $gameName;
    private string $description;
    private int $id;

    public function __construct(string $username, string $avatar, string $date, string $gameName, string $description, int $id)
    {
        $date_array = explode(" ", $date);
        $this->username = $username;
        $this->avatar = $avatar;
        $this->date = $date_array[0];
        $this->time = explode(".", $date_array[1])[0];
        $this->gameName = $gameName;
        $this->description = $description;
        $this->id = $id;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
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

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time): void
    {
        $this->time = $time;
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

    public function getId(): int
    {
        return $this->id;
    }

    public function setid(int $id): void
    {
        $this->id = $id;
    }
}