<?php
declare (strict_types=1);

namespace Ledc\CrmebPoster;

use Ledc\ThinkModelTrait\Contracts\HasMigrationCommand;
use think\console\Input;
use think\console\Output;

/**
 * 安装数据库迁移文件
 */
class Command extends \think\console\Command
{
    use HasMigrationCommand;

    /**
     * @return void
     */
    protected function configure()
    {
        // 指令配置
        $this->setName('install:migrate:crmeb-poster')
            ->setDescription('安装插件的数据库迁移文件');

        // 迁移文件映射
        $this->setFileMaps([
            'CreatePosterType' => dirname(__DIR__) . '/migrations/20250508021229_create_poster_type.php',
            'CreatePoster' => dirname(__DIR__) . '/migrations/20250508021236_create_poster.php',
        ]);
    }

    /**
     * @param Input $input
     * @param Output $output
     * @return void
     */
    protected function execute(Input $input, Output $output)
    {
        $this->eachFileMaps($input, $output);
    }
}
