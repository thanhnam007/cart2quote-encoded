<?php
/**
 *  CART2QUOTE CONFIDENTIAL
 *  __________________
 *  [2009] - [2018] Cart2Quote B.V.
 *  All Rights Reserved.
 *  NOTICE OF LICENSE
 *  All information contained herein is, and remains
 *  the property of Cart2Quote B.V. and its suppliers,
 *  if any.  The intellectual and technical concepts contained
 *  herein are proprietary to Cart2Quote B.V.
 *  and its suppliers and may be covered by European and Foreign Patents,
 *  patents in process, and are protected by trade secret or copyright law.
 *  Dissemination of this information or reproduction of this material
 *  is strictly forbidden unless prior written permission is obtained
 *  from Cart2Quote B.V.
 * @category    Cart2Quote
 * @package     Quotation
 * @copyright   Copyright (c) 2018. Cart2Quote B.V. (https://www.cart2quote.com)
 * @license     https://www.cart2quote.com/ordering-licenses(https://www.cart2quote.com)
 */

namespace Cart2Quote\Quotation\Block\Adminhtml\System\Config\Form\Field\Support;

/**
 * Class VersionAndEditionInfo
 * @package Cart2Quote\Quotation\Block\Adminhtml\System\Config\Form\Field\Support
 */
class VersionAndEditionInfo extends \Magento\Config\Block\System\Config\Form\Field implements \Magento\Framework\Data\Form\Element\Renderer\RendererInterface
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Cart2Quote\Quotation\Helper\Data\MetadataInterface
     */
    private $metaData;

    /**
     * VersionAndEditionInfo constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param \Cart2Quote\Quotation\Helper\Data\MetadataInterface $metaData
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Module\Manager $moduleManager,
        \Cart2Quote\Quotation\Helper\Data\MetadataInterface $metaData
    ) {
        parent::__construct($context);
        $this->moduleManager = $moduleManager;
        $this->metaData = $metaData;
    }

    /**
     * Retrieve HTML markup for given form element
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $html = '<tr><th align="left">Name</th><th align="left">Version/Data</th></tr>';
        $html .= sprintf(
            '<tr><td>%s</td><td>%s</td></tr>',
            __('PHP Version:'),
            $this->metaData->getPhpVersion()
        );
        $html .= sprintf(
            '<tr><td>%s</td><td>%s</td></tr>',
            __('IonCube Version:'),
            $this->metaData->getIoncubeVersion()
        );
        $html .= '<tr><td></td></tr>';
        $html .= sprintf(
            '<tr><td>%s</td><td>%s</td></tr>',
            __('Magento Version:'),
            $this->metaData->getMagentoVersion()
        );
        $html .= sprintf(
            '<tr><td>%s</td><td>%s</td></tr>',
            __('Magento Edition:'),
            $this->metaData->getMagentoEdition()
        );
        $html .= '<tr><td></td></tr>';
        $html .= sprintf(
            '<tr><td>%s</td><td>%s</td></tr>',
            __('Cart2Quote Version:'),
            $this->metaData->getCart2QuoteVersion()
        );
        $html .= '<tr><td></td></tr>';
        if ($this->moduleManager->isEnabled('Cart2Quote_Not2Order')) {
            $html .=
                sprintf(
                    '<tr><td>%s</td><td>%s</td></tr>',
                    __('Not2Order Version:'),
                    $this->metaData->getNot2OrderVersion()
                );
        }
        if ($this->moduleManager->isEnabled('Cart2Quote_Desk')) {
            $html .=
                sprintf(
                    '<tr><td>%s</td><td>%s</td></tr>',
                    __('Customer SupportDesk Version:'),
                    $this->metaData->getSupportDeskVersion()
                );
        }
        if ($this->moduleManager->isEnabled('Cart2Quote_DeskEmail')) {
            $html .=
                sprintf(
                    '<tr><td>%s</td><td>%s</td></tr>',
                    __('DeskEmail Version:'),
                    $this->metaData->getDeskEmailVersion()
                );
        }
        $html .= $this->_renderValue($element);

        return $this->_decorateRowHtml($element, $html);
    }
}
