<!doctype html>
<html>
    <head>
        <title>TODO: get from DB</title>
        <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css">
        <script type="text/javascript" src="<?php echo URL;?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL;?>public/js/custom.js"></script>
    </head>
    <body>
        <div id="header">
            Header
            <br>
            <a href="<?php echo URL;?>index">Index</a>
            <a href="<?php echo URL;?>help">Help</a>
            <a href="<?php echo URL;?>login">Login</a>
            <a href="<?php echo URL;?>help/sample1/12/test">Sample1</a>
            <a href="<?php echo URL;?>help/sample2">Sample2</a>
            <?php if(session::get('loggedIn') == true): ?>
                <a href="<?php echo URL;?>dashboard/logout">Logout</a>
            <?php else: ?>
                <a href="<?php echo URL;?>login">Login</a>
            <?php endif; ?>
        </div>
        <div id="content">