<?php
declare(strict_types=1);
namespace Thomd729\Itblog\User;

class Message
{
    private string $message;
    private string $date;

    public function __construct(string $message, string $date) 
    {
        $this->message = $message;
        $this->date = $date;
    }

    public static function getBiggestId(object $pdo,
    string $login): array 
    {
        $query = 'SELECT MAX(admin_answer.id) as maxId
        FROM admin_answer JOIN user_message 
        ON admin_answer.user_message_id = user_message.id 
        JOIN user ON user_message.user_id = user.id
        WHERE user.login = :login';

        $stm = $pdo->prepare($query);
        $stm->bindValue(':login', $login);
        $stm->execute();

        return $stm->fetchAll();
    }

    public static function getSmallestId(object $pdo,
    string $login): array 
    {
        $query = 'SELECT MIN(admin_answer.id) as minId 
        FROM admin_answer JOIN user_message 
        ON admin_answer.user_message_id = user_message.id 
        JOIN user ON user_message.user_id = user.id
        WHERE user.login = :login';
        
        $stm = $pdo->prepare($query);
        $stm->bindValue(':login', $login);
        $stm->execute();

        return $stm->fetchAll();
    }

    public static function getRowsAmount(object $pdo,
    string $login): array 
    {
        $query = 'SELECT COUNT(admin_answer.id) as rowsAmount 
        FROM admin_answer JOIN user_message 
        ON admin_answer.user_message_id = user_message.id 
        JOIN user ON user_message.user_id = user.id
        WHERE user.login = :login';
        
        $stm = $pdo->prepare($query);
        $stm->bindValue(':login', $login);
        $stm->execute();

        return $stm->fetchAll();
    }

    public static function getMessages(object $pdo, 
    string $login, int $startId): object
    {
        $limit = 5;
        $query = 'SELECT user_message.message, 
        user_message.date as user_message_date, admin_answer.id, 
        admin_answer.answer, admin_answer.date as admin_answer_date
        FROM admin_answer JOIN user_message 
        ON admin_answer.user_message_id = user_message.id 
        JOIN user ON user_message.user_id = user.id 
        WHERE user.login = :login AND admin_answer.id <= :startId
        ORDER BY admin_answer.id DESC LIMIT :limit';
        $stm = $pdo->prepare($query);
        $stm->bindValue(':login', $login);
        $stm->bindValue(':startId', $startId);
        $stm->bindValue(':limit', $limit);
        $stm->execute();

        return $stm;
    }

    public function findUserId(object $pdo, string $login): array 
    {
        $query = 'SELECT id FROM user 
        WHERE login = :login';
        $stm = $pdo->prepare($query);
        $stm->bindValue(':login', $login);
        $stm->execute();

        return $stm->fetchAll();
    }

    public function message(object $pdo, int $userId): void 
    {   
        $query = 'INSERT INTO user_message 
        (message, date, status, user_id) 
        VALUES (:message, :date, :status, :userId)';
        $stm = $pdo->prepare($query);

        $stm->bindValue(':message', $this->message);
        $stm->bindValue(':date', $this->date);
        $stm->bindValue(':status', 'unreplied');
        $stm->bindValue(':userId', $userId);

        $stm->execute();
    }
}