<?php

namespace Ledc\CrmebPoster\model;

use think\db\BaseQuery;
use think\db\Query;
use think\exception\ValidateException;
use think\Model;

/**
 * eb_poster_type 海报类型表
 */
class EbPosterType extends Model
{
    use HasEbPosterType;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'eb_poster_type';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $pk = 'id';

    /**
     * 【模型事件】新增前
     * @param self $model
     * @return bool|null
     */
    public static function onBeforeInsert(EbPosterType $model): ?bool
    {
        if (self::queryUniqueByTitle($model->title)->count()) {
            throw new ValidateException('海报类型标题已存在');
        }

        if (self::queryUniqueByParser($model->parser)->count()) {
            throw new ValidateException('解析器已存在');
        }

        return true;
    }

    /**
     * 查询唯一标题
     * @param string $title 海报类型
     * @return Query|BaseQuery
     */
    public static function queryUniqueByTitle(string $title): Query
    {
        return (new static)->db()->where('title', $title);
    }

    /**
     * 查询唯一解析器
     * @param string $parser 解析器
     * @return Query|BaseQuery
     */
    public static function queryUniqueByParser(string $parser): Query
    {
        return (new static)->db()->where('parser', $parser);
    }

    /**
     * 【模型事件】更新前
     * @param self $model
     * @return bool|null
     */
    public static function onBeforeUpdate(EbPosterType $model): ?bool
    {
        if (self::queryUniqueByTitle($model->title)->where('id', '<>', $model->id)->count()) {
            throw new ValidateException('海报类型标题已存在');
        }

        if (self::queryUniqueByParser($model->parser)->where('id', '<>', $model->id)->count()) {
            throw new ValidateException('解析器已存在');
        }

        return true;
    }
}
