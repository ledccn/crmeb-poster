<?php

namespace Ledc\CrmebPoster\dao;

use app\dao\BaseDao;
use Ledc\CrmebPoster\model\EbPoster;

/**
 * 海报
 */
class PosterDao extends BaseDao
{
    /**
     * @return string
     */
    protected function setModel(): string
    {
        return EbPoster::class;
    }
}
