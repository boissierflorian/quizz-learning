<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>{pagetitle}</title>
        <meta charset="utf-8">
        <meta name="description" content="Quizz Learning">
        <meta name="keywords" content="Quizzes">
        <meta name="author" content="Boissier Florian">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {stylesheets}
            <link rel="stylesheet" href="{link}" />
        {/stylesheets}
    </head>

    <body>
        {navbar}

        <div class="w3-content">
            {content}
        </div>

        {footer}

        {scripts}<script type="text/javascript" src="{link}"></script>
        {/scripts}
    </body>
</html>