<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h1>{pagetitle}</h1>

<div class="w3-panel w3-green">
    <p>Votre inscription a été validée !</p>
    <p>Redirection en cours <i class="fa fa-spinner w3-spin"></i></p>
</div>

<script type="text/javascript">
    window.setTimeout(function(){
        window.location.href = "<?= base_url('login') ?>";
    }, 3000);
</script>