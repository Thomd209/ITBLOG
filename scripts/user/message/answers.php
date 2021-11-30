<?php
use Thomd729\Itblog\User\Message;

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');

if (! empty($_COOKIE['login'])) {
    $login = $_COOKIE['login'];
}

$smallestId = Message::getSmallestId($pdo, $login);
$rowsAmount = Message::getRowsAmount($pdo, $login);

if ($rowsAmount[0]['rowsAmount'] > 0) {
    $startId = ! empty($_POST['startId']) 
    ? (int) $_POST['startId'] - 1
    : Message::getBiggestId($pdo, $login)[0]['maxId'];

    $messages = Message::getMessages($pdo, $login, $startId);
}

?>

<?php if (! empty($messages) && ! empty($_POST)): ?>
    <?php foreach ($messages as $message): ?>
        <div class="feedback-wrapper feedback" data-row-id="<?= $message['id'] ?>">
            <h4>Сообщение:</h4>
            <div class="message feedback">
                <p class="feedbacks-message"><?= $message['message'] ?></p>
                <span class="feedbacks-date">Дата: <?= $message['user_message_date'] ?></span>
            </div>
            <h4>Ответ:</h4>
            <div class="answer feedback">
                <p class="feedbacks-message"><?= $message['answer'] ?></p>
                <span class="feedbacks-date">Дата: <?= $message['admin_answer_date'] ?></span>
            </div>
        </div>
        <div class="feedback-separator"></div>
    <?php endforeach; ?>
<?php endif; ?>