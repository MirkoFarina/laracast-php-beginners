<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
?>

<?php require('partials/header.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <?php echo $message ?>
  </div>
</main>
<?= require base_path('views/partials/footer.php'); ?>