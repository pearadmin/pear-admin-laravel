<?php
return [

    /**
     * 通用配置
     */
    'icp_num' => '',  //备案号
    'icp_title' => '',  //备案号
    'icp_link' => '',  //备案链接地址
    'site_logo' => '/static/admin/admin/images/logo.png', //logo
    'site_name' => 'HB Admin', //站点名称
    'site_aword' => '总 有 人 山 高 路 远 为 你 而 来', //一句话介绍

    /**
     * 登录页配置
     */
    'login_background' => '/static/admin/admin/images/background.svg',//登录背景图片地址

    /**
     * 首页配置
     */
    'banner' => array(
        array('image' => '','title' => '','sub_title' => '','link' => '','target' => '_blank'),
        array('image' => '','title' => '','sub_title' => '','link' => '','target' => '_blank'),
    ),
    'concat' => array(
        'email' => 'aaaaa@email.com',
        'phone' => array('010-45486546','15645415464'),
        'address' => 'XXX省XXX市XXX区,XXX大厦XX楼X-XX号',
    ),
];
