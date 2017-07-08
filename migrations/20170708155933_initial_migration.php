<?php

use Phinx\Migration\AbstractMigration;

class InitialMigration extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('events');
        $users->addColumn('name', 'string', array('limit' => 255))
            ->addColumn('description', 'text')
            ->addColumn('place', 'string', array('limit' => 255))
            ->addColumn('img', 'string', array('limit' => 255))
            ->addColumn('begin_date_time', 'datetime')
            ->addColumn('status', 'integer')
            ->save();
    }

    public function down()
    {
        $this->dropTable('events');
    }

}
