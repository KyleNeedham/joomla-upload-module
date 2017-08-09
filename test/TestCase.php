<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNativeTest\Upload;

use Joomla\Registry\Registry;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    const defaultParams = [
        'title' => 'Title',
        'url' => 'https://localhost/upload?q=s',
        'form_field' => 'file',
    ];

    protected function setUp()
    {
        require_once __DIR__ . '/../stubs/joomla.php';
    }

    protected function getContentWithParams(Registry $params)
    {
        ob_start();

        require __DIR__ . '/../stubs/run.php';

        return ob_get_clean();
    }
}