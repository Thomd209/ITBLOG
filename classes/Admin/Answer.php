<?php
declare(strict_types=1);
namespace Thomd729\Itblog\Admin;

class Answer
{
    private string $answer;
    private string $date;

    public function __construct(string $answer, string $date) 
    {
        $this->answer = $answer;
        $this->date = $date;
    }

    public static function getBiggestId(object $pdo): array 
    {
        $query = 'SELECT MAX(id) as maxId FROM user_message';
        $stm = $pdo->query($query);

        return $stm->fetchAll();
    }

    public static function getSmallestId(object $pdo): array 
    {
        $query = 'SELECT MIN(id) as minId FROM user_message';
        $stm = $pdo->query($query);

        return $stm->fetchAll();
    }

    public static function getRowsAmount(object $pdo): array 
    {
        $query = 'SELECT COUNT(id) as rowsAmount 
        FROM user_message';
        $stm = $pdo->query($query);

        return $stm->fetchAll();
    }

    public static function getMessages(object $pdo, 
    int $startId): object
    {
        $limit = 5;
        $query = 'SELECT user_message.id as id, user.login, 
        user_message.message, user_message.date, 
        user_message.status FROM user_message JOIN user
        ON user_message.user_id = user.id 
        WHERE user_message.id <= :startId 
        ORDER BY user_message.id DESC LIMIT :limit';

        $stm = $pdo->prepare($query);
        $stm->bindValue(':startId', $startId);
        $stm->bindValue(':limit', $limit);
        $stm->execute();

        return $stm;
    }

    public function answer(object $pdo, int $id): void 
    {
        $query = 'INSERT INTO admin_answer 
        (answer, date, user_message_id) 
        VALUES (:answer, :date, :user_message_id)';

        $stm = $pdo->prepare($query);

        $stm->bindValue(':answer', $this->answer);
        $stm->bindValue(':date', $this->date);
        $stm->bindValue(':user_message_id', $id);

        $stm->execute();
    }

    public function setReplied(object $pdo, int $id): void 
    {
        $query = 'UPDATE user_message SET status = :status
        WHERE id = :id';

        $stm = $pdo->prepare($query);
        $stm->bindValue(':status', 'replied');
        $stm->bindValue(':id', $id);
        $stm->execute();
    }
}