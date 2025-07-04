<?php

use Phinx\Db\Adapter\AdapterInterface;
use Phinx\Db\Adapter\MysqlAdapter;
use think\migration\Migrator;
use think\migration\db\Column;

/**
 * 海报类型表
 */
class CreatePosterType extends Migrator
{
    /**
     * Change Method.
     */
    public function change(): void
    {
        $table = $this->table('poster_type', ['comment' => '海报类型表', 'signed' => false]);
        $table->addColumn('title', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '海报类型标题', 'null' => false])
            ->addColumn('parser', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '解析器', 'null' => false])
            ->addColumn('icon', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '图标', 'null' => false, 'default' => ''])
            ->addColumn('description', AdapterInterface::PHINX_TYPE_TEXT, ['limit' => MysqlAdapter::TEXT_REGULAR, 'comment' => '描述', 'null' => true, 'default' => null])
            ->addColumn('create_time', 'datetime', ['comment' => '创建时间', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('update_time', 'datetime', ['comment' => '更新时间', 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addIndex(['title'], ['unique' => true, 'name' => 'idx_title'])
            ->addIndex(['parser'], ['unique' => true, 'name' => 'idx_parser'])
            ->create();
    }
}
