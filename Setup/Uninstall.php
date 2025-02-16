<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 *
 * See COPYING.txt for license details.
 */
namespace Gfe\SalesSequence\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Uninstall
 */
class Uninstall implements UninstallInterface
{
    /**
     * Uninstall DB schema
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->removeColumns($setup);
        $setup->endSetup();
    }

    /**
     * Remove columns
     *
     * @param SchemaSetupInterface $setup
     * @return void
     */
    protected function removeColumns(SchemaSetupInterface $setup)
    {
        $setup->getConnection()->dropColumn(
            $setup->getTable('sales_sequence_profile'),
            'pattern'
        );
    }
}
