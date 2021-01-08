<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Annoucement.php';
class AnnouncementRepository extends Repository
{

    public function getAnnouncement(int $id): ?Annoucement{
        $statement = $this->database->connect()->prepare("
            SELECT username, date, game_name, description FROM public.announcements JOIN users u on u.user_id = announcements.user_id JOIN profiles p on p.profile_id = u.profile_id WHERE ann_id = :id;
        ");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();

        $announcement= $statement->fetch(PDO::FETCH_ASSOC);

        if($announcement == false){
            return null;
        }
        return new Annoucement(
            $announcement['username'],
            $announcement['date'],
            $announcement['game_name'],
            $announcement['description']
        );
    }

    public function addAnn(Annoucement $annoucement){
        $statement = $this->database->connect()->prepare("
            INSERT INTO public.announcements (user_id, game_name, description)
            VALUES (? ? ?)
        ");
        $user_id=1;
        $statement->execute([
            $user_id,
            $annoucement->getGameName(),
            $annoucement->getDescription()
        ]);
    }
}