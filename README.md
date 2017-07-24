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
        'email' => '  Mammoth.Support@web.com  ',
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
- required              // Campo obrigatório
- min                   // Tamanho mínimo
- max                   // Tamanho máximo
- bool                  // Tipo lógico
- email                 // E-mail válido
- float                 // Tipo flutuante(valor real)
- int                   // Tipo inteiro
- ip                    // Endereço de IP válido
- mac                   // Endereço de MAC válido
- regex                 // Define uma regra através de uma expressão regular
- url                   // Endereço de URL válida
```

# Licença

O filter é uma aplicação open-source licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).
