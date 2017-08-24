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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="/js/uploader.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" type="text/css">
    </head>
    <body>
        <nav class="navbar navbar-light bg-faded">
            <h1 class="navbar-brand mb-0">Joomla! module for uploads.</h1>
        </nav>

        <div class="container">
            <div class="row">
<?php for ($i = 0; $i < $repeat; $i++): ?>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <?php echo $content; ?>
                </div>
<?php endfor; ?>
            </div>
        </div>
    </body>
</html>
