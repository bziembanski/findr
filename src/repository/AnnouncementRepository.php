<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Annoucement.php';
class AnnouncementRepository extends Repository
{

    public function getAnn(int $id): ?Annoucement{
        $statement = $this->database->connect()->prepare("
            SELECT username, date, game_name, description FROM public.announcements JOIN users u on u.user_id = announcements.user_id JOIN profiles p on p.profile_id = u.profile_id WHERE ann_id = :id;
        ");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $announcement= $statement->fetch(PDO::FETCH_ASSOC);

        if($announcement == false){
            return null;
        }
        $stmt = $this->database->connect()->prepare('
                SELECT username, avatar FROM users JOIN profiles p on p.profile_id = users.profile_id WHERE users.user_id=:user_id;
            ');
        $stmt->bindParam(':user_id', $announcement['user_id'], PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Annoucement(
            $user['username'],
            $user['avatar'],
            $announcement['date'],
            $announcement['game_name'],
            $announcement['description']
        );
    }

    public function addAnn(Annoucement $annoucement, int $user_id){
        $statement = $this->database->connect()->prepare("
            INSERT INTO public.announcements (user_id, game_name, description)
            VALUES (?, ?, ?)
        ");
        $statement->execute([
            $user_id,
            $annoucement->getGameName(),
            $annoucement->getDescription()
        ]);
    }

    public function getAnns(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM announcements
        ');
        $stmt->execute();
        $anns = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($anns as $ann){
            $stmt = $this->database->connect()->prepare('
                SELECT username, avatar FROM users JOIN profiles p on p.profile_id = users.profile_id WHERE users.user_id=:user_id;
            ');
            $stmt->bindParam(':user_id', $ann['user_id'], PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $result[] = new Annoucement(
                $user['username'],
                $user['avatar'],
                $ann['date'],
                $ann['game_name'],
                $ann['description']
            );
        }
        return $result;
    }
}