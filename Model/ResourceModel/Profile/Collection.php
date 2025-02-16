<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Gfe\SalesSequence\Model\ResourceModel\Profile;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\SalesSequence\Model\ResourceModel\Profile as ProfileResource;
use Magento\SalesSequence\Model\Profile;

/**
 * Profile collection
 */
class Collection extends AbstractCollection
{
    /**
     * Name prefix of events that are dispatched by model
     *
     * @var string
     */
    protected $_eventPrefix = 'sales_sequence_profile_collection';

    /**
     * Name of event parameter
     *
     * @var string
     */
    protected $_eventObject = 'collection';

    /**
     * Id field name
     *
     * @var string
     */
    protected $_idFieldName = 'profile_id';

    /**
     * Initialize entity model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Profile::class, ProfileResource::class);
    }

    /**
     * Init select
     *
     * @return $this
     */
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->getSelect()->join(
            ['meta' => $this->getResource()->getTable('sales_sequence_meta')],
            'main_table.meta_id = meta.meta_id',
            ['meta.entity_type', 'meta.store_id']
        );
        return $this;
    }
}
