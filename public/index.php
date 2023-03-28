<?php
define('PRIVATE_DIR', dirname(__DIR__) . '/private/');

include(PRIVATE_DIR . 'functions.php');

$lang = getLang();
$translation_strings = getTranslationStrings($lang);

part('header', [
  'title' => 'Users',
]);

?>
<div class="container">
  <?php part('user_form', [
    'form_id' => 'add_user',
    'url' => 'api.php?action=add-user',
    'heading' => 'Add user'
  ]); ?>
  <?php part('users_list'); ?>
</div>

<div class="popup">
  <?php part('user_form', [
      'form_id' => 'update_user',
      'url' => 'api.php?action=update-user',
      'heading' => 'Update user'
  ]); ?>
</div>

<script src="View.js"></script>
<script src="script.js"></script>
