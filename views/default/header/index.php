<!doctype html>
<html>
    <head>
        <title>TODO: get from DB</title>
        <?php $this->config->includeStyle('default.css')?>
        <?php $this->config->includeScript('jquery.js')?>
        <?php $this->config->includeScript('default.js')?>
        <?php $this->config->includeBootstrap()?>
    </head>
    <body>
        <div class="container-fluid nopadding">
            <div id="header">
                <a href="<?=URL?>index">Index</a>
                <a href="<?=URL?>help">Help</a>
                <a href="<?=URL?>dashboard">Dashboard</a>
                <a href="<?=URL?>help/sample1/12/test">Sample1</a>
                <a href="<?=URL?>help/sample2">Sample2</a>
                <?php if(session::get('loggedIn') == true): ?>
                    <a href="<?=URL?>login/logout">Logout</a>
                <?php else: ?>
                    <a href="<?=URL?>login">Login</a>
                <?php endif; ?>
                    <span id="save-boxes" class="btn">Save</span>
                    <span id="add-box" class="btn">Add</span>
                    <span id="single-box-edit" class="btn">Edit</span>
            </div>
            <div id="content" class="content">
                <div class="row">