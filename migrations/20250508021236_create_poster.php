<?php

use Phinx\Db\Adapter\AdapterInterface;
use Phinx\Db\Adapter\MysqlAdapter;
use think\migration\Migrator;
use think\migration\db\Column;

/**
 * 海报表
 */
class CreatePoster extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('poster', ['comment' => '海报表', 'signed' => false]);
        $table->addColumn('poster_type_id', AdapterInterface::PHINX_TYPE_INTEGER, ['comment' => '海报类型ID', 'null' => false, 'signed' => false])
            ->addColumn('title', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '海报名称', 'null' => false])
            ->addColumn('parser', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '解析器', 'null' => false])
            ->addColumn('design_source_file', AdapterInterface::PHINX_TYPE_STRING, ['limit' => MysqlAdapter::TEXT_TINY, 'comment' => '设计源文件', 'null' => false, 'default' => ''])
            ->addColumn('value', AdapterInterface::PHINX_TYPE_TEXT, ['limit' => MysqlAdapter::TEXT_MEDIUM, 'comment' => '配置值', 'null' => true, 'default' => null])
            ->addColumn('sort', AdapterInterface::PHINX_TYPE_INTEGER, ['limit' => MysqlAdapter::INT_TINY, 'comment' => '排序', 'null' => false, 'default' => 100, 'signed' => false])
            ->addColumn('enabled', AdapterInterface::PHINX_TYPE_INTEGER, ['limit' => MysqlAdapter::INT_TINY, 'comment' => '启用', 'null' => false, 'default' => 1, 'signed' => false])
            ->addColumn('create_time', 'datetime', ['comment' => '创建时间', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('update_time', 'datetime', ['comment' => '更新时间', 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addForeignKey('poster_type_id', 'poster_type', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addIndex(['parser'], ['name' => 'idx_parser'])
            ->addIndex(['sort'], ['name' => 'idx_sort'])
            ->addIndex(['enabled'], ['name' => 'idx_enabled'])
            ->create();
    }
}
