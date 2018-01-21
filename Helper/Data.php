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

namespace Plugindx\Framework\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Data\Form\FormKey;
use Magento\Backend\Model\UrlInterface;

class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;

    /**
     * @var \Magento\Backend\Model\UrlInterface
     */
    protected $backendUrl;

    public function __construct(
        FormKey $formKey,
        UrlInterface $backendUrl
    ) {
        $this->formKey = $formKey;
        $this->backendUrl = $backendUrl;
    }

    public function getReportUrl()
    {
        return $this->backendUrl->getUrl('plugindx/report')
                    . '?isAjax=true&form_key='
                    . $this->formKey->getFormKey();
    }
}
