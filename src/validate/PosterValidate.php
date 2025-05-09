<?php
declare (strict_types=1);

namespace Ledc\CrmebPoster\validate;

use think\Validate;

/**
 * 海报验证
 */
class PosterValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'poster_type_id' => 'require|number',
        'title' => 'require',
        'parser' => 'require',
        //'value' => 'require',
        'sort' => 'require|number',
        'enabled' => 'require|boolean',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'poster_type_id.require' => '请选择海报类型ID',
        'poster_type_id.number' => '请选择海报类型',
        'title.require' => '请输入海报名称',
        'parser.require' => '请输入解析器',
        'value.require' => '请输入配置值',
        'sort.require' => '请输入排序',
        'sort.number' => '请输入排序',
        'enabled.require' => '请选择是否启用',
        'enabled.boolean' => '请选择是否启用',
    ];
}
