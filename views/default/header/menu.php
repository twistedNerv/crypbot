<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index">tN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?=URL?>index">Home</a></li>
                <li><a href="<?=URL?>help">Help</a></li>
                <li><a href="<?=URL?>help/sample1/12/test">Sample1</a></li>
                <li><a href="<?=URL?>help/sample2">Sample2</a></li>
                <?php if(session::get('loggedIn') == true): ?>
                    <li><a href="<?=URL?>login/logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?=URL?>login">Login</a></li>
                <?php endif; ?>
                <li><a href="#" id="save-boxes">Save</a></li>
                <li><a href="#" id="add-box">Add</a></li>
                <li><a href="#" id="single-box-edit">Edit</a></li>
            </ul>
        </div>
    </div>
</nav>