<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNativeTest\Upload;

use Joomla\Registry\Registry;

final class UploadContainerAttributesTest extends TestCase
{
    public function test()
    {
        $params = TestCase::defaultParams;
        $params['url'] = 'http://silly/url?with=query&string=1';
        $params['file_field'] = 'silly_file';
        $content = $this->getContentWithParams(new Registry($params));

        static::assertContains('data-mod-upload-url="' . $params['url'] . '"', $content);
        static::assertContains('<input name="' . $params['file_field'] . '"', $content);
    }
}
