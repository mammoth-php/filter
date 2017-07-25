<?php

    require 'vendor/autoload.php';
    
    $filter = new Mammoth\Filtration\Filter();
    
    $datas = [
        'nome'  => '  mammoth  ',
        'url'   => '  Http://www.mammoth-php.com  ',
        'email' => '  Mammoth.Support@web.com  ',
        'senha' => '  mammoth.web@2017  '
    ];
            
    $filters = [
        'nome'  => 'trim|upper',
        'url'   => 'trim|lower|url',
        'email' => 'trim|email|lower',
        'senha' => 'trim|md5:true'
    ];
    
    $datas = $filter->set($datas, $filters);
    
    var_dump($datas);