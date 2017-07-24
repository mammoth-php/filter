<?php

    require 'vendor/autoload.php';
    
    $filter = new Mammoth\Filtration\Filter();
    
    $datas = [
        'nome'  => 'mammoth',
        'url'   => 'http://www.mammoth-php.com',
        'email' => 'Mammoth.Support@web.com',
        'senha' => 'mammoth.web@2017'
    ];
            
    $filters = [
        'nome'  => 'trim|raw|upper',
        'url'   => 'trim|url',
        'email' => 'trim|email|lower',
        'senha' => 'md5:true'
    ];
    
    $filter->set($datas, $filters);
    
    var_dump($datas);