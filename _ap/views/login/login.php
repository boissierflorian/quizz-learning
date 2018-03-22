<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<h1>{pagetitle}</h1>

<div class="w3-container w3-content" style="max-width: 600px">
    <?php if( ! empty(validation_errors())): ?>
        <div class="w3-panel w3-red w3-display-container">
            <h3>Erreurs</h3>
            <span onclick="this.parentElement.style.display='none'"
                  class="w3-button w3-display-topright w3-hover-none w3-hover-text-black">X</span>
            <p><?= validation_errors(); ?></p>
        </div>
    <?php endif; ?>
    <?= form_open('login/login', array('class' => 'w3-margin-bottom')) ?>
    <div class="w3-card-4 w3-padding-16">
        <div class="w3-content w3-container">
            <label><b>Pseudo</b></label>
            <input class="w3-input w3-border" type="text" name="username" value="<?= set_value('username') ?>" />
            <label><b>Mot de passe</b></label>
            <input class="w3-input w3-border" type="password" name="password" value="<?= set_value('password') ?>" />
            <label><b>Captcha</b></label>
            <div class="w3-container w3-center w3-margin-bottom w3-margin-top">
                {captcha_image}
            </div>
            <input class="w3-input w3-border" type="text" name="captcha" value="" />
            <input name="rememberme" class="w3-check" type="checkbox" checked="checked">Se souvenir de moi
            <br>
            <a class="w3-hover-text-green" href="#">Mot de passe oublié ?</a>
            <input class="w3-button w3-right w3-round-large w3-white w3-border w3-border-black w3-hover-white w3-hover-text-green w3-hover-border-green" type="submit" value="Se connecter" />
        </div>
    </div>

    <?= form_close() ?>
</div>