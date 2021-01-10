<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Annoucement.php';
class AnnouncementRepository extends Repository
{

    public function getAnn(int $id): ?Annoucement{
        $statement = $this->database->connect()->prepare("
            SELECT ann_id, username, date, game_name, description, avatar, u.user_id FROM public.announcements JOIN users u on u.user_id = announcements.user_id JOIN profiles p on p.profile_id = u.profile_id WHERE ann_id = :id;
        ");
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $state = $statement->execute();
        $announcement= $statement->fetch(PDO::FETCH_ASSOC);
        if(!$announcement) return null;
        return new Annoucement(
            $announcement['username'],
            $announcement['avatar'],
            $announcement['date'],
            $announcement['game_name'],
            $announcement['description'],
            $announcement['ann_id'],
            $announcement['user_id']
        );
    }

    public function addAnn(Annoucement $annoucement, int $user_id){
        $statement = $this->database->connect()->prepare("
            INSERT INTO announcements (user_id, game_name, description)
            VALUES (?, ?, ?)
        ");
        $statement->execute([
            $user_id,
            $annoucement->getGameName(),
            $annoucement->getDescription()
        ]);
    }

    public function getAnns(): array{
        $stmt = $this->database->connect()->prepare('
            SELECT ann_id, game_name, description, date, username, avatar, u.user_id FROM announcements JOIN users u on u.user_id = announcements.user_id JOIN profiles p on p.profile_id = u.profile_id;
        ');
        $stmt->execute();
        $anns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->getAnnouncementsArray($anns);
    }

    public function getAnnsByGameNameOrDesc(string $searchString): array
    {
        $searchString = '%'.strtolower($searchString).'%';
        $stmt= $this->database->connect()->prepare('
            SELECT ann_id, game_name, description, date, username, avatar, u.user_id FROM announcements JOIN users u on u.user_id = announcements.user_id JOIN profiles p on p.profile_id = u.profile_id WHERE LOWER(game_name) LIKE :search OR LOWER(description) LIKE :search;
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getAnnouncementsArray(array $anns): array
    {
        $result = [];
        foreach($anns as $ann){
            $result[] = new Annoucement(
                $ann['username'],
                $ann['avatar'],
                $ann['date'],
                $ann['game_name'],
                $ann['description'],
                $ann['ann_id'],
                $ann['user_id']
            );
        }
        return $result;
    }
}