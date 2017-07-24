# Filter

O Filter é uma classe de filtragem baseada em PHP que permite filtrar quaisquer dados.

# Instalação

via composer.

```
$ composer require mammoth-php/filter
``` 

# Exemplo de Filtragem dos dados

###### Dados

``` php
$datas = [
   'nome'  => ' mammoth ',
   'email' => ' Mammoth.Support@Web.com ',
   'senha' => ' mammoth.web '
];
```

###### Filtros

``` php
$filters = [
   'nome'  => 'trim|capitalize',
   'email' => 'trim|lower|email',
   'senha' => 'trim|pw_hash:12'
];
 ```
 
 ###### Validando os dados de acordo com os filtros
 
 ``` php
   $filter = new Mammoth\Filtration\Filter();

   $filter->set($datas, $rules);
   
   // Verificar se houve as mudanças
   var_dump($datas);
 ```
 
 # Usando
 
 ``` php
 <?php
 
    require 'vendor/autoload.php';
    
    $filter = new Mammoth\Filtration\Filter();
    
    $datas = [
        'nome'  => '  mammoth  ',
        'email' => '  Mammoth.Support@Web.com  ',
        'senha' => '  mammoth.web  '
    ];
    
    $filter->set($datas, [
        'nome'  => 'trim|capitalize',
        'email' => 'trim|lower|email',
        'senha' => 'trim|pw_hash:12'
    ]);
    
    var_dump($datas);
```

# Tipos de filtros

``` php
- email                             
- float                 
- int               
- string                
- url                   
- url_encode
- raw
```

# Outros filtros

``` php
- capitalize                             
- date                 
- lower               
- round                
- striptags                   
- title
- trim
- upper
```

# Filtros para criptografia

``` php
- base64
- crypt
- md5
- pw_hash
- sha1
```

# Licença

O filter é uma aplicação open-source licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).
