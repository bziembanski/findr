<?php


class UserProfile{
    private $email;
    private $joined;
    private $favouriteGame;
    private $avatar;
    private $username;

    public function __construct($email, $username, $joined, $favouriteGame, $avatar)
    {
        $this->email = $email;
        $this->joined = explode(".",$joined)[0];
        $this->favouriteGame = $favouriteGame;
        $this->avatar = $avatar;
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getJoined(): string
    {
        return $this->joined;
    }

    public function setJoined($joined)
    {
        $this->joined = $joined;
    }

    public function getFavouriteGame(): string
    {
        return $this->favouriteGame;
    }

    public function setFavouriteGame($favouriteGame)
    {
        $this->favouriteGame = $favouriteGame;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
}