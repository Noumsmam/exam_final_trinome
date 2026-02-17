<?php
// Use the application-generated CSP nonce (set in config.php)
// SecurityHeadersMiddleware already sends the CSP header.

$nonce = '';
if (class_exists('\Flight')) {
  $nonce = \Flight::get('csp_nonce') ?? '';
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'Takalo Takalo' ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>

<body>


  <?php
  include 'fragments/header.php';
  ?>

  <main classe="view-content" id="view-content">
    <?= $content ?>
  </main>

  <?php include 'fragments/footer.html'; ?>

</body>

</html>