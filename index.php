<?php

    require 'vendor/autoload.php';
    
    $filter = new Mammoth\Filtration\Filter();
    
    $datas = [
       'homepage' => ' <p>Http://Mammoth-Web.Com</p> ',
       'titulo'   => ' <p>organização de suporte para desenvolvimento web</p> ',
       'nome'     => ' <p>desenvolvimento PHP</p> ',
       'email'    => ' <p>Mammoth.Support@Web.com</p> ',
       'data'     => ' <p>2017-07-24</p> ',
       'senha'    => ' 123456 '
    ];
            
    $filters = [
        'homepage' => 'trim|strip_tags|lower|url',
        'titulo'   => 'trim|strip_tags|title',
        'nome'     => 'trim|strip_tags|capitalize',
        'email'    => 'trim|strip_tags|lower|email',
        'data'     => 'trim|strip_tags|date:d/m/Y',
        'senha'    => 'trim|pw_hash'
    ];
    
    echo "Dados sem filtros: <br/>";
    var_dump($datas);
    
    $filter->set($datas, $filters);
    
     echo "Dados com filtros: <br/>";
    var_dump($datas);