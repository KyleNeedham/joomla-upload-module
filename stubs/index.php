<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace {
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/joomla.php';

    $params = new \Joomla\Registry\Registry([
        'title' => 'My Uploader',
        'url' => 'http://localhost/upload?access=1',
        'form_field' => 'file',
    ]);

    $repeat = (int) (array_key_exists('repeat', $_GET) ? $_GET['repeat'] : 1);

    require __DIR__ . '/run.php';
}