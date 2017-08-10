<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace {
    /** @var \Joomla\Registry\Registry $params */

    if (! defined('_MOD_UPLOAD_JS')) {
        define('_MOD_UPLOAD_JS', 1);

        JFactory::getDocument()->addScript('/media/mod_upload/js/uploader.js');
    }

    $title = $params->get('title', 'Upload Files');
    $url = $params->get('url', 'http://localhost');
    $fileField = $params->get('file_field', 'file');

    require JModuleHelper::getLayoutPath('mod_upload', 'default');

}
