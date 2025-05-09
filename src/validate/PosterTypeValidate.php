<?php
declare (strict_types=1);

namespace Ledc\CrmebPoster\validate;

use think\Validate;

/**
 * 海报类型验证
 */
class PosterTypeValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'title' => 'require',
        'parser' => 'require',
        'icon' => 'require',
        'description' => 'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'title.require' => '请输入海报类型标题',
        'parser.require' => '请输入解析器',
        'icon.require' => '请上传图标',
        'description.require' => '请输入描述',
    ];
}
