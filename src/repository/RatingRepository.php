<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Rating.php';
class RatingRepository extends Repository
{
    public function getRatings(int $id): ?array{
        $stmt = $this->database->connect()->prepare('
            SELECT rating_id, rating_type, rated_on, username, avatar FROM ratings JOIN users u on u.user_id = ratings.rated_by JOIN profiles p on p.profile_id = u.profile_id WHERE rated_who=:id;
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
}