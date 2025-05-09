<?php

namespace Ledc\CrmebPoster\model;

/**
 * eb_poster 海报表
 * @property integer $id (主键)
 * @property integer $poster_type_id 海报类型ID
 * @property string $title 海报名称
 * @property string $parser 解析器
 * @property string $design_source_file 设计源文件
 * @property mixed $value 配置值
 * @property integer $sort 排序
 * @property integer $enabled 启用
 * @property string $create_time 创建时间
 * @property string $update_time 更新时间
 */
trait HasEbPoster
{
}
