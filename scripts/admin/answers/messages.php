<?php
use Thomd729\Itblog\Admin\Answer;

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');

$smallestId = Answer::getSmallestId($pdo);
$rowsAmount = Answer::getRowsAmount($pdo);

if ($rowsAmount[0]['rowsAmount'] > 0) {
    $startId = ! empty($_POST['startId']) 
    ? (int) $_POST['startId'] - 1
    : Answer::getBiggestId($pdo)[0]['maxId'];

    $messages = Answer::getMessages($pdo, $startId);
}

?>

<?php if (! empty($messages) && ! empty($_POST)): ?>
    <?php foreach ($messages as $message): ?>
        <div class="feedback" data-row-id="<?= $message['id'] ?>">
            <?php if ($message['status'] === 'replied'): ?>
                <span class="message-status">Вы ответили на данное сообщение</span>
            <?php endif; ?>
            <span class="feedbacks-user">Сообщение от: <?= $message['login'] ?></span>
            <span class="message-text">Текст сообщения:</span>
            <p class="feedbacks-message"><?= $message['message'] ?></p>
            <span class="feedbacks-date">Дата: <?= $message['date'] ?></span>
        </div>
        <button class="btn-answer btn btn-primary">
            <a href="answer.php?id=<?= $message['id'] ?>&login=<?= $message['login'] ?>" class="answer-link">Ответить</a>
        </button>
        <div class="feedback-separator"></div>
    <?php endforeach; ?>
<?php endif; ?>