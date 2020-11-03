<?php
/**
 * @package     Class BrandsJatController
 * @author      Jatniel Guzmán
 * @copyright   2020 Jatniel Guzmán
 * @license     MIT License
 * @link        https://jatnielguzman.com
 * @link        https://twitter.com/jatnielguzman
 */

class BrandsJatController extends FrontController
{

    public $php_self = 'brands';

    public function init()
    {
        parent::init();
    }

    public function initContent()
    {

        $brands = $this->getBrands();
        
        $this->context->smarty->assign('lorem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis lacinia massa. 
        Fusce ante purus, aliquet eget porttitor ut, sodales in risus. Nunc gravida ipsum id gravida pretium.');
        
        $this->context->smarty->assign('dev', 'Jatniel Guzmán');
        
        $this->context->smarty->assign($brands);

        parent::initContent();

        // themes/mytheme/templates/brandsjat.tpl
        $this->setTemplate('brandsjat.tpl'); 
    }

    public function getBrands(){

        $brands = Manufacturer::getManufacturers(false, (int)Context::getContext()->language->id);

        foreach ($brands as &$brand) {

            $brand['image'] = $this->context->language->iso_code.'-default';

            $brand['link'] = $this->context->link->getManufacturerLink($brand['id_manufacturer']);

            $fileExist = file_exists(
                _PS_MANU_IMG_DIR_ . $brand['id_manufacturer'] . '-' .
                ImageType::getFormattedName('medium').'.jpg'
            );

            if ($fileExist) {
                $brand['image'] = $brand['id_manufacturer'];
            }
        }

        return  array(
            'brands' => $brands,
            'page_link' => $this->context->link->getPageLink('manufacturer'),
            'text_list_nb' => Configuration::get('BRAND_DISPLAY_TEXT_NB'),
            'brand_display_type' => Configuration::get('BRAND_DISPLAY_TYPE'),
            'display_link_brand' => Configuration::get('PS_DISPLAY_SUPPLIERS'),
        );
    }

}