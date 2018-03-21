<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="w3-top">
    <div class="w3-bar w3-green w3-padding-small" id="topNavbar">
        <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right"
            onclick="toggleElement('topNavbar')" title="Toggle Navigation menu">
            <i class="fa fa-bars"></i>
        </a>
        {navbar_links}
            <a href="{link}" class="w3-bar-item w3-button w3-text-white w3-hover-none w3-hover-text-black"><b>{name}</b></a>
        {/navbar_links}

        <a href="{auth_link}" class="w3-bar-item w3-button w3-right w3-green w3-round-large w3-border-white w3-border w3-hover-none w3-hover-text-black w3-hover-border-black">
            <b>{auth_label}</b></a>

        <?php if( ! $user_logged): ?>
            <a href="{register_link}" class="w3-bar-item w3-button w3-right w3-margin-right w3-hover-none"><b>{register_label}</b></a>
        <?php endif; ?>
    </div>

    <div id="smallNavbar" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
        {navbar_links}
            <a href="{link}" class="w3-bar-item w3-button" onclick="toggleElement('smallNavbar')">{name}</a>
        {/navbar_links}
    </div>
</div>