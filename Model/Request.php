<?php defined('BUCKYBALL_ROOT_DIR') || die();

class DevFine_RequestCallback_Model_Request extends FCom_Core_Model_Abstract
{
    static protected $_table = 'devfine_rcallback_request';
    static protected $_origClass = __CLASS__;
    static protected $_fieldOptions = [
        'status' => [
            'open'   => 'Open',
            'closed' => 'Closed',
        ],
    ];

    protected static $_validationRules = [
        ['name', '@required'],
        ['phone', '@required']
    ];


    public function onBeforeSave()
    {
        if (false == parent::onBeforeSave()) return false;

        if (false == $this->date_added) {
            $this->set(['date_added' => $this->BDb->now()]);
        }

        $this->set('date_modified', $this->BDb->now());

        return true;
    }
}
