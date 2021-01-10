<?php


class Rating
{
    private int $id;
    private bool $ratingType;
    private string $date;
    private string $username;
    private string $avatar;

    public function __construct(int $id, bool $ratingType, string $date, string $username, string $avatar)
    {
        $this->id = $id;
        $this->ratingType = $ratingType;
        $this->date = $date;
        $this->username = $username;
        $this->avatar = $avatar;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function isRatingType(): bool
    {
        return $this->ratingType;
    }

    public function setRatingType(bool $ratingType): void
    {
        $this->ratingType = $ratingType;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }


}