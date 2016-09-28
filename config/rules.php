<?php

return [
    //admin
    //'http://admin.yiiadmin.c' => 'admin/login/index',
    //'adminloginindex' => 'admin/index/default',







    //index
    'topic' => 'index/index/topic',







    /*[//配置组方式
        'pattern' => 'posts/<page:\d+>/<tag>',//规则
        'route' => 'post/index',//目标地址
        'defaults' => ['page' => 1, 'tag' => ''],//所有参数
        'suffix' => '.json',//后缀
    ]*/

    /*  实现REST风格的API,默认GET
     * 'PUT,POST post/<id:\d+>' => 'post/create',
     * 'DELETE post/<id:\d+>' => 'post/delete',
     * 'post/<id:\d+>' => 'post/view',
    */

    /*简单二级域名规则
     * 'http://admin.example.com/login' => 'admin/user/login',
     * 'http://www.example.com/login' => 'site/login',
     * */

];
