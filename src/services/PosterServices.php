<?php

namespace Ledc\CrmebPoster\services;

use app\services\BaseServices;
use Ledc\CrmebPoster\dao\PosterDao;
use ReflectionException;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

/**
 * 海报
 */
class PosterServices extends BaseServices
{
    /**
     * @var PosterDao
     */
    protected $dao;

    /**
     * @param PosterDao $dao
     */
    public function __construct(PosterDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return PosterDao
     */
    public function getDao(): PosterDao
    {
        return $this->dao;
    }

    /**
     * 获取列表
     * @param array $where
     * @return array
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException|ReflectionException
     */
    public function getList(array $where = []): array
    {
        [$page, $limit] = $this->getPageValue();
        $list = $this->dao->selectList($where, '*', $page, $limit);
        $count = $this->dao->count($where);
        return compact('list', 'count');
    }
}