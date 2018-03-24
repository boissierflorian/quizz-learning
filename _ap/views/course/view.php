<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>


<h1><?= $course['title'] ?></h1>

<div>
    <?php foreach ($course['steps'] as $step): ?>
        <a href="<?= base_url('course/view/' . $course['id_course'] . '/' . $step['n_step']) ?>" class="w3-button w3-tiny w3-circle <?= $step['n_step'] == $current_step ? 'w3-light-grey' : 'w3-white' ?>
        w3-border w3-border-grey w3-hover-light-grey w3-text-grey"><?= $step['n_step'] ?></a>

        <?php if($step['n_step'] != count($course['steps'])): ?>
            <span class="qz-step-bubble"></span>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<div class="w3-container w3-card-4 w3-margin-top w3-margin-bottom">
    <?= $step_data['content'] ?>
</div>
