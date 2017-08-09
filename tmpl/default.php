<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/** @var \Joomla\Registry\Registry $params */

?>


<div class="mod-upload">
    <span class="upload-title"><?php echo $params->get('title'); ?></span>
    <div
        data-mod-upload-url="<?php echo $params->get('url'); ?>"
        data-mod-upload-field-name="<?php echo $params->get('file_field'); ?>"
    >

    </div>
</div>
