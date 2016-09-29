<?php

/*
 * This file is part of Fixhub.
 *
 * Copyright (C) 2016 Fixhub.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Route::group([
    'middleware' => ['web', 'auth', 'jwt', 'admin'],
    'namespace'  => 'Admin',
    'prefix'     => 'admin',
], function () {
    Route::resource('/', 'AdminController', [
        'only'  => ['index'],
        'names' => [
            'index' => 'admin.index',
        ],
    ]);

    Route::resource('templates', 'DeployTemplateController', [
        'only'  => ['index', 'store', 'update', 'destroy', 'show'],
        'names' => [
            'index'   => 'admin.templates.index',
            'store'   => 'admin.templates.store',
            'update'  => 'admin.templates.update',
            'destroy' => 'admin.templates.destroy',
            'show'    => 'admin.templates.show',
        ],
    ]);

    Route::resource('projects', 'ProjectController', [
        'only'  => ['create', 'index', 'store', 'update', 'destroy'],
        'names' => [
            'create'  => 'admin.projects.create',
            'index'   => 'admin.projects.index',
            'store'   => 'admin.projects.store',
            'update'  => 'admin.projects.update',
            'destroy' => 'admin.projects.destroy',
        ],
    ]);

    Route::resource('users', 'UserController', [
        'only' => ['index', 'store', 'update', 'destroy'],
        'names' => [
            'index'   => 'admin.users.index',
            'store'   => 'admin.users.store',
            'update'  => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ],
    ]);

    Route::resource('keys', 'KeyController', [
        'only' => ['create', 'index', 'store', 'update', 'destroy'],
        'names' => [
            'create'  => 'admin.keys.create',
            'index'   => 'admin.keys.index',
            'store'   => 'admin.keys.store',
            'update'  => 'admin.keys.update',
            'destroy' => 'admin.keys.destroy',
        ],
    ]);
    Route::post('keys/reorder', [
        'as'    => 'admin.keys.reorder',
        'uses'  => 'KeyController@reorder',
    ]);

    Route::resource('links', 'LinkController', [
        'only' => ['create', 'index', 'store', 'update', 'destroy'],
        'names' => [
            'create'  => 'admin.links.create',
            'index'   => 'admin.links.index',
            'store'   => 'admin.links.store',
            'update'  => 'admin.links.update',
            'destroy' => 'admin.links.destroy',
        ],
    ]);
    Route::post('links/reorder', [
        'as'    => 'admin.links.reorder',
        'uses'  => 'LinkController@reorder',
    ]);

    Route::resource('tips', 'TipController', [
        'only' => ['create', 'index', 'store', 'update', 'destroy'],
        'names' => [
            'create'  => 'admin.tips.create',
            'index'   => 'admin.tips.index',
            'store'   => 'admin.tips.store',
            'update'  => 'admin.tips.update',
            'destroy' => 'admin.tips.destroy',
        ],
    ]);

    Route::resource('groups', 'ProjectGroupController', [
        'only' => ['create', 'index', 'store', 'update', 'destroy'],
        'names' => [
            'create'   => 'admin.groups.create',
            'index'   => 'admin.groups.index',
            'store'   => 'admin.groups.store',
            'update'  => 'admin.groups.update',
            'destroy' => 'admin.groups.destroy',
        ],
    ]);

    Route::post('groups/reorder', [
        'as'    => 'admin.groups.reorder',
        'uses'  => 'ProjectGroupController@reorder',
    ]);
});
