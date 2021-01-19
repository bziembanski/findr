<?php


class UserProfile{
    private string $email;
    private string $joined;
    private string $favouriteGame;
    private string $avatar;
    private string $username;
    private int $userId;
    private string $role;

    public function __construct($email, $username, $joined, $favouriteGame, $avatar, $userId, $role)
    {
        $this->email = $email;
        $this->joined = explode(".",$joined)[0];
        $this->favouriteGame = $favouriteGame;
        $this->avatar = $avatar;
        $this->username = $username;
        $this->userId = $userId;
        $this->role = $role;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getJoined(): string
    {
        return $this->joined;
    }

    public function getFavouriteGame(): string
    {
        return $this->favouriteGame;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}