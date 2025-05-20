<?php

use app\adminapi\middleware\AdminAuthTokenMiddleware;
use app\adminapi\middleware\AdminCheckRoleMiddleware;
use app\adminapi\middleware\AdminLogMiddleware;
use app\http\middleware\AllowOriginMiddleware;
use Ledc\CrmebPoster\adminapi\controller\poster\Poster;
use Ledc\CrmebPoster\adminapi\controller\poster\PosterType;
use think\facade\Route;

/**
 * 海报&海报类型 相关路由
 */
Route::group('poster', function () {
    // 海报
    Route::group('poster', function () {
        Route::get('index', implode('@', [Poster::class, 'index']))->option(['real_name' => '海报列表']);
        Route::post('save', implode('@', [Poster::class, 'save']))->option(['real_name' => '保存海报']);
        Route::delete(':id', implode('@', [Poster::class, 'delete']))->option(['real_name' => '删除海报']);
        Route::get('read', implode('@', [Poster::class, 'read']))->option(['real_name' => '海报详情']);
    });

    // 海报类型
    Route::group('poster_type', function () {
        Route::get('index', implode('@', [PosterType::class, 'index']))->option(['real_name' => '海报类型列表']);
        Route::post('save', implode('@', [PosterType::class, 'save']))->option(['real_name' => '保存海报类型']);
    });
})->middleware([
    AllowOriginMiddleware::class,
    AdminAuthTokenMiddleware::class,
    AdminCheckRoleMiddleware::class,
    AdminLogMiddleware::class
])->option(['mark' => 'poster', 'mark_name' => '海报&海报类型管理']);