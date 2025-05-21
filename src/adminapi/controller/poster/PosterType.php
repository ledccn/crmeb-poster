<?php
declare (strict_types=1);

namespace Ledc\CrmebPoster\adminapi\controller\poster;

use app\adminapi\controller\AuthController;
use app\Request;
use Ledc\CrmebPoster\model\EbPosterType;
use Ledc\CrmebPoster\validate\PosterTypeValidate;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Response;

/**
 * 海报类型
 */
class PosterType extends AuthController
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

    /**
     * 保存资源
     * @param Request $request
     * @return Response
     */
    public function save(Request $request): Response
    {
        $id = $request->post('id/d', 0);
        $data = $request->postMore(['title', 'parser', 'icon', 'description']);

        validate(PosterTypeValidate::class)->check($data);

        if ($id) {
            $model = EbPosterType::findOrFail($id);
            $model->save($data);
        } else {
            $model = EbPosterType::create($data);
        }

        return response_json()->success('ok', $model->toArray());
    }
}
