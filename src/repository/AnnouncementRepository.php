<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Annoucement.php';
class AnnouncementRepository extends Repository
{

    public function getAnn(int $id): ?Annoucement{
        $statement = $this->database->connect()->prepare("
            SELECT * FROM anns WHERE anns.ann_id = :id;
        ");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $announcement= $statement->fetch(PDO::FETCH_ASSOC);
        if(!$announcement) return null;
        return new Annoucement(
            $announcement['username'],
            $announcement['avatar'],
            $announcement['date'],
            $announcement['game_name'],
            $announcement['description'],
            $announcement['ann_id'],
            $announcement['user_id'],
            $announcement['game_username']
        );
    }

    public function addAnn(Annoucement $annoucement, int $user_id){
        $statement = $this->database->connect()->prepare("
            INSERT INTO announcements (user_id, game_name, description, game_username)
            VALUES (?, ?, ?, ?)
        ");
        $statement->execute([
            $user_id,
            $annoucement->getGameName(),
            $annoucement->getDescription(),
            $annoucement->getGameUsername()
        ]);
    }

    public function deleteAnn(int $ann_id): bool
    {
        $statement = $this->database->connect()->prepare("
            DELETE FROM announcements WHERE ann_id=:ann_id;
        ");
        $statement->bindParam(":ann_id", $ann_id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function getAnns(): array{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM anns;
        ');
        $stmt->execute();
        $anns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->getAnnouncementsArray($anns);
    }

    public function getAnnsById(int $id): array{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM anns WHERE anns.user_id=:user_id
        ');
        $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $anns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->getAnnouncementsArray($anns);
    }

    public function getAnnsByGameNameOrDesc(string $searchString): array
    {
        $searchString = '%'.strtolower($searchString).'%';
        $stmt= $this->database->connect()->prepare('
            SELECT * FROM anns WHERE LOWER(game_name) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAnnouncementsArray(array $anns): array
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
                $ann['user_id'],
                $ann['game_username']
            );
        }
        return $result;
    }
}