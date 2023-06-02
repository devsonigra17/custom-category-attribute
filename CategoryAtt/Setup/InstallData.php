<?php

namespace Dev\CategoryAtt\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Model\Category;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
    public function __construct(
        EavSetupFactory $eavSetupFactory
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $data = [
                    'type'          =>  'varchar',
                    'label'         =>  'Custom Attribute',
                    'input'         =>  'text',
                    'sort_order'    =>  '40',
                    'source'        =>  '',
                    'global'        =>  1,
                    'visible'       =>  true,
                    'required'      =>  true,
                    'user_defined'  =>  false,
                    'default'       =>  null,
                    'group'         =>  '',
                    'backend'       =>  ''
        ];
        $eavSetup->addAttribute(Category::ENTITY,'category_attribute',$data);
    }
}