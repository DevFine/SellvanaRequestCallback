<?php defined('BUCKYBALL_ROOT_DIR') || die();

class DevFine_RequestCallback_Admin_Controller_List extends FCom_Admin_Controller_Abstract_GridForm
{
    protected static $_origClass = __CLASS__;
    protected $_gridHref = 'callback';
    protected $_modelClass = 'DevFine_RequestCallback_Model_Request';
    protected $_gridTitle = 'Callback Requests';
    protected $_recordName = 'Request';
    protected $_mainTableAlias = 'devfine_rcallback_request';
    protected $_permission = 'callbacks/list';

    public function gridConfig()
    {
        $config = parent::gridConfig();

        $config['columns'] = [
            ['type' => 'row_select'],
            ['name' => 'name', 'index' => 'name', 'label' => 'Name', 'width' => 70],
            ['name' => 'phone', 'index' => 'phone', 'label' => 'Phone', 'width' => 120],
        ];

        return $config;
    }

}