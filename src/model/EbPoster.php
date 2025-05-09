<?php

namespace Ledc\CrmebPoster\model;

use think\Model;

/**
 * eb_poster 海报表
 */
class EbPoster extends Model
{
    use HasEbPoster;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eb_poster';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $pk = 'id';

    /**
     * 类型转换
     * @var array
     */
    protected $type = [
        'value' => 'json'
    ];
}
