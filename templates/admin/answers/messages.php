<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/checkAccess.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/answers/messages.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>

<div class="feedbacks-wrapper">
    <h3 class="main-page-link">
        <a class="categories-main-page" href="../articles/articles.php">Вернуться на главную</a>
    </h3>
    <h3 class="answers-admin-title">Сообщения</h3>
    <div class="feedbacks">
        <span class="feedbacks-rows-amount" data-rows-amount="<?= $rowsAmount[0]['rowsAmount'] ?>"></span>
        <span class="feedbacks-smallest-id" data-smallest-id="<?= $smallestId[0]['minId'] ?>"></span>
        <?php if (! empty($messages)): ?>
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
    </div>
    <button class="btn-next-feedbacks btn btn-primary">Показать следующие 5 сообщений</button>
</div>

<script src="../../../public/js/admin/messages/nextMessages.js"></script>
<script src="../../../public/js/admin/messages/hideBtn.js"></script>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>