<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnythingNativeTest\Upload;

use Joomla\Registry\Registry;

final class ItWillDisplayTitleFromParamsTest extends TestCase
{
    public function test()
    {
        $params = TestCase::defaultParams;
        $params['title'] = 'This is an upload form.';
        $content = $this->getContentWithParams(new Registry($params));

        static::assertContains(
            '>' . $params['title'] . '<',
            $content
        );
    }
}