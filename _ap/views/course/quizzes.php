<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h1><?= 'Quizzes - ' . $course['title'] ?></h1>

{quizzes}
    <a href="<?= base_url('quizz/'); ?>{id_quizz}">
        <div class="w3-card-4 w3-padding w3-margin-bottom">
            <h3><i>#{id_quizz} {quizz_title}</i></h3>
        </div>
    </a>
{/quizzes}