<div style="padding:15px !important;">
    <?php $this->config->loadAssets()?>
    <strong>Model test:</strong><br>
    <?php echo $this->sampleModel?>
    <br>-----------<br>
    <strong>Controller params test:</strong><br>
    <?php echo $this->sample2?>
    <br>-----------<br>
    <strong>Logged user test:</strong><br>
    Object - <?php echo ($this->user->nickname) ? "filled. Hi, " . $this->user->nickname . "!" : "empty!"?><br>
    Session - <?php echo ($this->session->get('loggedIn')) ? "logged in!" : "empty!"; ?>
</div>