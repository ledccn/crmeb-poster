<?php
declare (strict_types=1);

namespace Ledc\CrmebPoster\api\controller\poster;

use app\Request;
use Ledc\CrmebPoster\services\PosterServices;
use ReflectionException;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Response;

/**
 * 海报
 */
class Poster
{
    /**
     * @var PosterServices
     */
    protected PosterServices $services;

    /**
     * 构造函数
     * @param PosterServices $services
     */
    public function __construct(PosterServices $services)
    {
        $this->services = $services;
    }

    /**
     * 显示资源列表
     * @method GET
     * @param Request $request
     * @return Response
     * @throws ReflectionException
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function index(Request $request): Response
    {
        $where = $request->getMore([
            'poster_type_id',
            ['enabled', 1],
        ]);

        return response_json()->success($this->services->getList(filter_where($where)));
    }

    /**
     * 显示指定的资源
     * @method GET
     * @param Request $request
     * @return Response
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function details(Request $request): Response
    {
        $id = $request->get('id/d');
        return response_json()->success('ok', $this->services->getDao()->get($id)->toArray());
    }
}
