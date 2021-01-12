<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Rating.php';
class RatingRepository extends Repository
{
    public function getRatings(int $id): ?array{
        $stmt = $this->database->connect()->prepare('
            SELECT rating_id, rating_type, rated_on, username, avatar 
            FROM ratings 
                JOIN users u on u.user_id = ratings.rated_by 
                JOIN profiles p on p.profile_id = u.profile_id 
            WHERE rated_who=:id ORDER BY rated_on DESC;
        ');
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($ratings as $rating) {
            $result[] = new Rating(
                $rating["rating_id"],
                $rating["rating_type"],
                $rating["rated_on"],
                $rating["username"],
                $rating["avatar"]
            );
        }
        return $result;
    }

    public function rate(bool $type, int $ratedWho, int $ratedBy): array{
        $stmt = $this->database->connect()->prepare("
            INSERT INTO ratings (rating_type, rated_who, rated_by) 
            VALUES (:rating_type, :rated_who, :rated_by) 
            ON CONFLICT ON CONSTRAINT ratings_pk_2 DO UPDATE SET rating_type=excluded.rating_type;
        ");
        $stmt->bindParam(":rated_by", $ratedBy, PDO::PARAM_INT);
        $stmt->bindParam(":rated_who", $ratedWho, PDO::PARAM_INT);
        $stmt->bindParam(":rating_type", $type, PDO::PARAM_BOOL);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
            SELECT rating_id, rating_type, rated_on, username, avatar 
            FROM ratings 
                JOIN users u on u.user_id = ratings.rated_by 
                JOIN profiles p on p.profile_id = u.profile_id 
            WHERE rated_who=:rated_who ORDER BY rated_on DESC;
        ');
        $stmt->bindParam(":rated_who", $ratedWho, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}