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


<div class="mod-upload-container card card-default" data-mod-upload>
    <div class="card-header">
        <span class="mod-upload-title"><?php echo $title; ?></span>
    </div>
    <div class="mod-upload-body card-body" data-mod-progress>
        <label class="mod-upload-btn btn btn-outline-success">
            Upload
            <input name="<?php echo $fileField; ?>" data-mod-input data-mod-upload-url="<?php echo $url; ?>" type="file" multiple hidden>
        </label>
    </div>
</div>
