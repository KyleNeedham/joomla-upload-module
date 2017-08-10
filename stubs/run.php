<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (! isset($repeat)) {
    $repeat = 1;
}

ob_start();
require __DIR__ . '/../mod_upload.php';
$content = ob_get_clean();

?>
<!doctype html>
<html>
<head>
    <title>Test Runner for Joomla! upload module.</title>
    <script src="/js/uploader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" type="text/css">
</head>
<body>

<nav class="navbar navbar-light bg-faded">
    <h1 class="navbar-brand mb-0">Joomla! module for uploads.</h1>
</nav>

<div style="height: 100px;"></div>

<?php for ($i = 0; $i < $repeat; $i++): ?>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php echo $content; ?>
        </div>
    </div>
    <div style="height: 25px;"></div>

<?php endfor; ?>
</body>
</html>