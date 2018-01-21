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

namespace Plugindx\Framework\Controller\Adminhtml;

use Magento\Backend\App\Action\Context;

abstract class Report extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magento_Backend::system';

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonResultFactory;

    /**
     * @var \Plugindx\Framework\Model\Report
     */
    protected $reportModel;

    /**
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param Config $resourceConfig
     * @param ReinitableConfigInterface $reinitableConfig
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory,
        \Plugindx\Framework\Model\Report $reportModel
    ) {
        $this->jsonResultFactory = $jsonResultFactory;
        $this->reportModel = $reportModel;
        parent::__construct($context);
    }

    protected function badRequest($result, $reason) {
        $result->setHeader('Content-Length', '0');
        $result->setHeader('Content-Type', 'text/plain');
        $result->setHeader('X-Failure-Reason', $reason);
        $result->setHeader('X-Failed-Retry', '1');
        $result->setStatusHeader(400);
        return $result;
    }
}
