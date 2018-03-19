<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="w3-top">
    <div class="w3-bar" id="topNavbar">
        <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right"
            onclick="toggleElement('topNavbar')" title="Toggle Navigation menu">
            <i class="fa fa-bars"></i>
        </a>
        {navbar_links}
            <a href="{link}" class="w3-bar-item w3-button">{name}</a>
        {/navbar_links}
    </div>

    <div id="smallNavbar" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
        {navbar_links}
            <a href="{link}" class="w3-bar-item w3-button" onclick="toggleElement('smallNavbar')">{name}</a>
        {/navbar_links}
    </div>
</div>

