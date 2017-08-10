<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/** @var string $title */
/** @var string $url */
/** @var string $fileField */

?>


<div class="mod-upload card card-default">
    <div class="card-header">
        <span class="upload-title"><?php echo $title; ?></span>
    </div>
    <div class="card-block">
        <div class="mod-upload-file-inputs"
            data-mod-upload-url="<?php echo $url; ?>"
            data-mod-upload-field-name="<?php echo $fileField; ?>"
        ></div>
    </div>
</div>
