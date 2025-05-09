<?php
declare (strict_types=1);

namespace Ledc\CrmebPoster\api\controller\poster;

use app\Request;
use Ledc\CrmebPoster\model\EbPosterType;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Response;

/**
 * 海报类型
 */
class PosterType
{
    /**
     * 显示资源列表
     * @param Request $request
     * @return Response
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function index(Request $request): Response
    {
        $model = new EbPosterType();
        $query = $model->db();

        return response_json()->success('ok', [
            'list' => $query->select()->toArray(),
            'count' => $query->count(),
        ]);
    }
}
