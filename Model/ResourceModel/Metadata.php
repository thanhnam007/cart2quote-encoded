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

namespace Cart2Quote\Quotation\Model\ResourceModel;

/**
 * Class Metadata
 * @package Cart2Quote\Quotation\Model\ResourceModel
 */
class Metadata
{
    use \Cart2Quote\Features\Traits\Model\ResourceModel\Metadata {
		getMapper as private traitGetMapper;
		getNewInstance as private traitGetNewInstance;
	}

	/**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * @var string
     */
    protected $resourceClassName;

    /**
     * @var string
     */
    protected $modelClassName;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $resourceClassName
     * @param string $modelClassName
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        $resourceClassName,
        $modelClassName
    ) {
        $this->objectManager = $objectManager;
        $this->resourceClassName = $resourceClassName;
        $this->modelClassName = $modelClassName;
    }

    /**
     * @return \Magento\Framework\Model\ResourceModel\Db\AbstractDb
     */
    public function getMapper()
    {
        return $this->traitGetMapper();
    }

    /**
     * @return \Magento\Framework\Api\ExtensibleDataInterface
     */
    public function getNewInstance()
    {
        return $this->traitGetNewInstance();
    }
}
