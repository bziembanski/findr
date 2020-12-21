<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserProfile.php';
class UserRepository extends Repository
{
    public function getUser(string $email): ?User{
        $statement = $this->database->connect()->prepare("
            SELECT * FROM public.users WHERE email = :email;
        ");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user= $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }
        return new User(
            $user['email'],
            $user['password']
        );
    }
    public function getProfile(string $email): ?UserProfile{
        $statement = $this->database->connect()->prepare("
            SELECT email, username, joined, favourite_game, avatar FROM public.users u JOIN public.profiles p 
                ON u.profile_id=p.profile_id WHERE u.email = :email
        ");
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $profile= $statement->fetch(PDO::FETCH_ASSOC);

        if($profile == false){
            return null;
        }
        return new UserProfile(
            $profile['email'],
            $profile['username'],
            $profile['joined'],
            $profile['favourite_game'],
            $profile['avatar']
        );
    }

    public function addUserProfile(User $user, UserProfile $profile){
        $statement = $this->database->connect()->prepare("
            INSERT INTO public.users (email, password)
            VALUES (?, ?)
        ");
        $statement->execute([
            $user->getEmail(),
            $user->getPassword()
        ]);
        $statement = $this->database->connect()->prepare("
            INSERT INTO public.profiles (favourite_game, username, avatar)
            VALUES (?, ?, ?)
        ");
        $statement->execute([
            "",
            $profile->getUsername(),
            ""
        ]);
        $statement = $this->database->connect()->prepare("
            SELECT * FROM public.profiles WHERE username = :username;
        ");
        $username= $profile->getUsername();
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        $newprofile= $statement->fetch(PDO::FETCH_ASSOC);

        $statement = $this->database->connect()->prepare("
            UPDATE public.users SET profile_id=? WHERE email=?;
        ");
        $statement->execute([
            $newprofile['profile_id'],
            $user->getEmail()
        ]);
    }
}