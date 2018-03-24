<?php defined('BASEPATH') OR exit('No direct script access allowed');

$row_count = 0;
?>

<h1>{pagetitle}</h1>

<?php foreach ($courses as $course): ?>
    <?php if($row_count++ % $courses_per_row == 0): ?>
        <div class="w3-row qz-card-row">
    <?php endif; ?>

    <div class="w3-card-2 w3-col m4 l3 w3-margin-right w3-margin-bottom w3-animate-top w3-hover-opacity"
         onclick="openLink('<?= base_url('course/view/' . $course['id_course']) ?>');">
        <header class="w3-container qz-card-container w3-red qz-card-header">
            <h6><?= $course['category_name'] ?></h6>
            <h5><?= $course['title'] ?></h5>
        </header>

        <div class="w3-container qz-card-container qz-card-content">
            <p class="w3-small w3-text-grey"><?= $course['creation_date'] ?></p>
            <p class="qz-card-description"><?= $course['description'] ?></p>
            <hr>
            <p class="w3-margin-left w3-left-align">Difficulté :
                <?php foreach ($course['difficulty_blocks'] as $block): ?>
                    <span class="w3-tag w3-tiny w3-round w3-<?= $block ?> w3-text-<?= $block ?>">.</span>
                <?php endforeach; ?>
            </p>
        </div>
    </div>

    <?php if($row_count % $courses_per_row == 0) {
        echo '</div>';
        $row_count = 0;
    } ?>

<?php endforeach; ?>