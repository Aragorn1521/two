<?php

return [
    'product/([0-9]+)'=>'product/view/$1',
    'privet'=>'privet/index',
    
    'catalog'=>'catalog/index',
    
    'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',
    'category/([0-9]+)'=>'catalog/category/$1',
    
    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)'=>'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    
    'cart' => 'cart/index',
    
    
    'user/register'=>'user/register',
    'user/login'=>'user/login',
    'user/logout'=>'user/logout',
    
    'cabinet/edit'=>'cabinet/edit',
    'cabinet'=>'cabinet/index',
    
    'admin/product/create' => 'adminProduct/create',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    'admin'=>'admin/index',
    
    
    ''=>'site/index',
    
    
    
]; 