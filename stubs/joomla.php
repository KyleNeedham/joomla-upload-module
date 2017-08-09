<?php
/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace {

    class JDocumentHtml
    {
        public function renderHead()
        {
        }
    }

    class JFactory
    {
        public static $document;

        public static function getDocument()
        {
            return static::$document;
        }
    }

    class JModuleHelper
    {
        public static function getLayoutPath($moduleName, $layout)
        {
            if ($moduleName !== 'mod_upload') {
                throw new InvalidArgumentException('Expected module name mod_upload got:' . $moduleName);
            }

            if ($layout !== 'default') {
                throw new InvalidArgumentException('Expected layout default got:' . $layout);
            }

            return __DIR__ . '/../tmpl/default.php';
        }
    }

    JFactory::$document = new JDocumentHtml();
}
