<?php defined('BUCKYBALL_ROOT_DIR') || die();

class DevFine_RequestCallback_Migrate extends BClass
{
    public function install__0_1_0()
    {
        $table = $this->DevFine_RequestCallback_Model_Request->table();

        $this->BDb->ddlTableDef($table, [
            'COLUMNS' => [
                'id' => 'int unsigned not null auto_increment',
                'name' => 'varchar(255) not null',
                'phone' => 'varchar(255) not null',
                'status' => "int unsigned not null default 0",
                'date_created' => 'datetime not null',
                'date_updated' => 'datetime',
            ],
            'PRIMARY' => '(id)'
        ]);
    }

    public function upgrade__0_1_0__0_1_1()
    {
        $table = $this->DevFine_RequestCallback_Model_Request->table();
        $this->BDb->ddlTableDef($table, [
            'COLUMNS' => [
                'product_id'      => 'int unsigned',
            ],
        ]);
    }
}
