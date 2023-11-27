<?php

namespace App\Helpers;

class menuAdminHelper{
    public static function menu()
    {
        return [
            [
                'name' => 'admin_sidebar.sub_product',
                'list-check' => ['attribute','category','keyword','product','comment','rating'],
                'icon' => 'fa fa-database',
                'level'  => [1,2],
                'sub'  => [
                    [
                        'name'  => 'admin_sidebar.attribute',
                        'namespace' => 'attribute',
                        'route' => 'admin.attribute.index',
                        'icon'  => 'fa fa-key',
                        'level'  => [1,2],
                    ],
                ]
            ],
        
        ];
        
    }
}