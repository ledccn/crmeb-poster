<?php

use app\api\middleware\AuthTokenMiddleware;
use app\api\middleware\StationOpenMiddleware;
use app\http\middleware\AllowOriginMiddleware;
use Ledc\CrmebPoster\api\controller\poster\Poster;
use Ledc\CrmebPoster\api\controller\poster\PosterType;
use think\facade\Route;
use think\Response;

/**
 * 海报&海报类型 相关路由
 */
Route::group('poster', function () {
    // 海报
    Route::get('poster', implode('@', [Poster::class, 'index']))->option(['real_name' => '海报列表']);
    Route::get('poster_details', implode('@', [Poster::class, 'details']))->option(['real_name' => '海报详情']);

    // 海报类型
    Route::get('poster_type', implode('@', [PosterType::class, 'index']))->option(['real_name' => '海报类型列表']);

    Route::miss(function () {
        if (app()->request->isOptions()) {
            $header = \think\Facade\Config::get('cookie.header');
            unset($header['Access-Control-Allow-Credentials']);
            return Response::create('ok')->code(200)->header($header);
        } else {
            return Response::create()->code(404);
        }
    });
})->middleware(AllowOriginMiddleware::class)
    ->middleware(StationOpenMiddleware::class)
    ->middleware(AuthTokenMiddleware::class, true)
    ->option(['mark' => 'poster', 'mark_name' => '海报&海报类型']);