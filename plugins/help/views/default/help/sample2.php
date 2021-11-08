<?php $this->config->loadAssets()?>
Model test:<br>
<?php echo $this->sampleModel?>
<br>-----------<br>
Parameters test:<br>
<?php echo $this->sample2?>
<br>-----------<br>
User test:<br>
Object <?php echo ($this->user->nickname) ? "full. Hi, " . $this->user->nickname : "empty"?><br>
Session *todo*