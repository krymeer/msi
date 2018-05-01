<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Nunito|Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/fontawesome-all.min.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/styles.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/alerts.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/buttons.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/choices.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/forms.css">
        <script src="<?php echo asset_url();?>js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo asset_url();?>js/main.js"></script>
        <script src="<?php echo asset_url();?>js/forms.js"></script>
        <title>Libsys v0.3.2</title>
    </head>
    <body>
        <div class="mobile-hide" id="menu-mask"></div>
        <div id="page-sidebar">
            <div id="upper-bar">
                <a href="/" class="page-logo">
                    libsys
                </a>
                <i id="nav-burger" class="fas fa-bars"></i>
            </div>
           <nav class="mobile-hide noselect">
                <a href="/">
                    <?php echo $this->lang->line('home__title'); ?>

                </a>
                <a href="/account">
                    <?php echo $this->lang->line('account__title'); ?>

                </a>
                <a href="/news">
                    <?php echo $this->lang->line('news__title'); ?>

                </a>
                <a href="/catalog">
                    <?php echo $this->lang->line('catalog__title'); ?>
                </a>
                <a href="/map">
                    <?php echo $this->lang->line('map__title'); ?>
                </a>
                <a href="/contact">
                    <?php echo $this->lang->line('contact__title'); ?>
                </a>
            <?php if (isset($this->session) && $this->session->logged_in): ?>
                <a href="/account/logout">
                    <?php echo $this->lang->line('logout__title'); ?>
                </a>
            <?php endif; ?>
            </nav>
        </div>
        <div id="page-container">
            <header>
                <h1 id="page-title"><?php echo $title; ?></h1>
            </header>
            <div class="page-contents page-<?php if (count ($this->uri->segments) > 0) echo $this->uri->segments[1]; else echo 'home'; ?>" id="page-<?php echo str_replace('/', '-', $this->uri->uri_string); ?>">