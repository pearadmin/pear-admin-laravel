<?php

/*
 * This file is part of the jiannei/layadmin.
 *
 * (c) jiannei <longjian.huang@foxmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return [
    'layout' => 'base',
    'title' => 'LayAdmin',
    'styles' => [
        'layadmin/css/loader.css',
        'layadmin/css/admin.css',
    ],
    'scripts' => [
        'admin/js/home.js',
    ],
    'components' => [
        'logo' => [
            'title' => 'Lay Admin',
            'image' => '/admin/images/logo.png',
        ],
        'menu' => [
            'collaspe' => false,
            'data' => '/api/menu/tree',
            'method' => 'GET',
            'accordion' => true,
            'control' => false,
            'controlWidth' => 500,
            'select' => '0',
            'async' => true,
        ],
        'tab' => [
            'enable' => true,
            'keepState' => true,
            'max' => 30,
            'session' => false,
            'index' => [
                'id' => '0',
                'href' => '/admin/console',
                'title' => '主页',
            ],
        ],
        'theme' => [
            'defaultColor' => '1',
            'defaultHeader' => 'light-theme',
            'defaultMenu' => 'dark-theme',
            'allowCustom' => true,
            'banner' => false,
        ],
        'colors' => [
            [
                'id' => '1',
                'color' => '#2d8cf0',
            ],
            [
                'id' => '2',
                'color' => '#5FB878',
            ],
            [
                'id' => '3',
                'color' => '#1E9FFF',
            ],
            [
                'id' => '4',
                'color' => '#FFB800',
            ],
            [
                'id' => '5',
                'color' => 'darkgray',
            ],
        ],
        'links' => [
            [
                'icon' => 'layui-icon layui-icon-auz',
                'title' => '官方网站',
                'href' => 'http://www.pearadmin.com',
            ],
            [
                'icon' => 'layui-icon layui-icon-auz',
                'title' => '开发文档',
                'href' => 'http://www.pearadmin.com',
            ],
            [
                'icon' => 'layui-icon layui-icon-auz',
                'title' => '开源地址',
                'href' => 'https://gitee.com/Jmysy/Pear-Admin-Layui',
            ],
        ],
        'other' => [
            'keepLoad' => 1200,
            'autoHead' => true,
        ],
        'header' => [
            'message' => '/admin/data/message.json',
        ],
    ],
];
