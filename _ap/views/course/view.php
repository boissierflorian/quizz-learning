<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>


<h1><?= $course['title'] ?></h1>

<div>
    <?php foreach ($steps as $step): ?>
        <a href="<?= base_url('course/view/' . $course['id_course'] . '/' . $step['n_step']) ?>" class="w3-button w3-tiny w3-circle <?= $step['n_step'] == $current_step ? 'w3-light-grey' : 'w3-white' ?>
        w3-border w3-border-grey w3-hover-light-grey w3-text-grey"><?= $step['n_step'] ?></a>

        <?php if($step['n_step'] != $steps_count): ?>
            <span class="qz-step-bubble"></span>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<div class="w3-container w3-card-4 w3-margin-top w3-margin-bottom">
    <h3><?= $current_step ?>. <?= $step_title ?></h3>
    <?= $step_content ?>

    <?php if ($quizzes_available): ?>
        <?php if($last_step): ?>
            <div class="w3-center w3-margin-bottom">
                <a href="<?= base_url('course/quizzes/' . $course['id_course']) ?>" class="w3-button w3-border w3-green w3-border-light-grey">Accéder aux quizzes !</a>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <p class="w3-center"><i>Aucun quizz n'a été trouvé pour ce cours. Créer en un maintenant !</i></p>
    <?php endif; ?>
</div>
