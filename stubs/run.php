<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

ob_start();
require __DIR__ . '/../mod_upload.php';
$content = ob_get_clean();

?>
<!doctype html>
<html>
<head>
    <title>Test Runner for Joomla! upload module.</title>
    <script src="/js/uploader.js"></script>
</head>
<body>
<?php echo str_repeat($content, isset($repeat) ? $repeat : 1); ?>
</body>
</html>