<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/user/checkAccess.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/user/message/answers.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>

<div class="feedbacks-wrapper">
    <h3 class="feedbacks-title">Ответы</h3>
    <div class="answers feedbacks">
        <span class="feedbacks-rows-amount" data-rows-amount="<?= $rowsAmount[0]['rowsAmount'] ?>"></span>
        <span class="feedbacks-smallest-id" data-smallest-id="<?= $smallestId[0]['minId'] ?>"></span>
        <?php if (! empty($messages)): ?>
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
    </div>
    <button class="btn-next-feedbacks btn btn-primary">Показать следующие 5 сообщений</button>
</div>

<script src="../../../public/js/user/messages/nextAnswers.js"></script>
<script src="../../../public/js/user/messages/btnNextMessages.js"></script>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>