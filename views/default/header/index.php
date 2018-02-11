<!doctype html>
<html>
    <head>
        <title>TODO: get from DB</title>
        <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css">
        <script type="text/javascript" src="<?php echo URL;?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo URL;?>public/js/default.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
            integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-fluid nopadding">
            <div id="header">
                <a href="<?php echo URL;?>index">Index</a>
                <a href="<?php echo URL;?>help">Help</a>
                <a href="<?php echo URL;?>dashboard">Dashboard</a>
                <a href="<?php echo URL;?>help/sample1/12/test">Sample1</a>
                <a href="<?php echo URL;?>help/sample2">Sample2</a>
                <?php if(session::get('loggedIn') == true): ?>
                    <a href="<?php echo URL;?>dashboard/logout">Logout</a>
                <?php else: ?>
                    <a href="<?php echo URL;?>login">Login</a>
                <?php endif; ?>
                    <span id="save-boxes" class="btn">Save</span>
                    <span id="add-box" class="btn">Add</span>
                    <span id="single-box-edit" class="btn">Edit</span>
            </div>
            <div id="content" class="content">
                <div class="row">