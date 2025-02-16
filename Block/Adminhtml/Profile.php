<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Gfe\SalesSequence\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Profile container
 *
 * @api
 */
class Profile extends Container
{
    /**
     * Initialize container
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_profile';
        $this->_headerText = __('Sequence Profiles');

        parent::_construct();
        $this->buttonList->remove('add');
    }
}
