<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo validation_errors(); ?>

<h1>{pagetitle}</h1>

<div class="w3-container w3-content" style="max-width: 600px">
    <?= form_open('login/login', array('class' => 'w3-margin-bottom')) ?>
    <div class="w3-card-4 w3-padding-16">
        <div class="w3-content w3-container">
            <label><b>Pseudo</b></label>
            <input class="w3-input w3-border" type="text" name="username" />
            <label><b>Mot de passe</b></label>
            <input class="w3-input w3-border" type="password" name="password" />
            <input class="w3-check" type="checkbox" checked="checked">Se souvenir de moi
            <br>
            <a class="w3-hover-text-green" href="#">Mot de passe oublié ?</a>
            <input class="w3-button w3-right w3-round-large w3-white w3-border w3-border-black w3-hover-white w3-hover-text-green w3-hover-border-green" type="submit" value="Se connecter" />
        </div>
    </div>

    <?= form_close() ?>
</div>