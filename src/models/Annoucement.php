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
    private int $userId;
    private string $gameUserName;

    public function __construct(string $username, string $avatar, string $date, string $gameName, string $description, int $id, int $userId, string $gameUserName)
    {
        $date_array = explode(" ", $date);
        $this->username = $username;
        $this->avatar = $avatar;
        $this->date = $date_array[0];
        $this->time = explode(".", $date_array[1])[0];
        $this->gameName = $gameName;
        $this->description = $description;
        $this->id = $id;
        $this->userId = $userId;
        $this->gameUserName = $gameUserName;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getGameName(): string
    {
        return $this->gameName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getGameUsername(): string
    {
        return $this->gameUserName;
    }
}