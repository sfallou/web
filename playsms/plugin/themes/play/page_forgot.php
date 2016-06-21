<?php defined('_SECURE_') or die('Forbidden'); ?>
<?php include $apps_path['themes']."/".$themes_module."/header.php"; ?>
<div class="modal" style="width: 55%; position: relative; top: auto; left: auto; margin: 0pt auto; z-index: 1;">
  <form action="index.php" method="post">
    <div class="modal-header">
      <h3>Forgot password</h3>
    </div>
    <div class="modal-body">
        <input type="hidden" name="app" value="page" />
        <input type="hidden" name="inc" value="forgot" />
        <input type="hidden" name="op" value="auth_forgot" />
        <div class="clearfix">
          <label for="username"><?php echo _('Username'); ?></label>
          <div class="input">
            <input type="text" size="30" name="username" id="username" class="medium">
          </div>
        </div>
        <div class="clearfix">
          <label for="email"><?php echo _('Email'); ?></label>
          <div class="input">
            <input type="text" size="30" name="email" id="email" class="medium">
          </div>
        </div>
        <div class="actions">
        <input type="submit" value="<?php echo _('Recover password'); ?>" class="btn primary">
        <input type="reset" value="Cancel" class="btn">
        </div>
    </div>
    <div>
      <ul>
      <li><a href="index.php?app=page&inc=login"><?php echo _('Login'); ?></a></li>
      <?php 
      if ($core_config['main']['cfg_enable_register']) { 
      ?>
      <li><a class="small" href="index.php?app=page&inc=register"><?php echo _('Register an account'); ?></a></li>
      <?php } ?>
      </ul>
    </div>
  </form>
</div>
<?php include $apps_path['themes']."/".$themes_module."/footer.php"; ?>
