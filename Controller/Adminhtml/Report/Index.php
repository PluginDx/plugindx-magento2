<?php
/**
 * Plugindx_Framework
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Plugindx
 * @package    Plugindx_Framework
 * @copyright  Copyright (c) 2017 Fast Division
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace Plugindx\Framework\Controller\Adminhtml\Report;

class Index extends \Plugindx\Framework\Controller\Adminhtml\Report
{
    public function execute()
    {
        $result = $this->jsonResultFactory->create();
        $config = $this->getRequest()->getContent();

        if ($config) {
            try {
                $generatedReport = $this->reportModel->build($config);
                $result->setData($generatedReport);
            } catch (\Exception $e) {
                $result = $this->badRequest($result, 'Unable to build report: ' . $e->getMessage());
            }
        } else {
            $result = $this->badRequest($result, 'Invalid config data');
        }

        return $result;
    }
}
