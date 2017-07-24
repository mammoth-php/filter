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
- email          // Remova todos os caracteres, exceto letras, dígitos e ! # $% & '* + - =? ^ _ `{|} ~ @. [] .              
- float          // Remova todos os caracteres, exceto os dígitos, + - e, opcionalmente , eE .  
- int            // Remova todos os caracteres, exceto dígitos, sinal de mais e menos.
- string         // Etiquetas de tira, opcionalmente tira ou codifica caracteres especiais.  
- url            // Remova todos os caracteres, exceto letras, dígitos e $ -_. +! * '(), {} | \\ ^ ~ [] `<> #%"; /?: @ & =  
- url_encode     // Cadeia de codificação de URL, opcionalmente tira ou codifica caracteres especiais.
- raw            // Não faça nada, tira ou codifica caracteres especiais.
```

# Outros filtros

``` php
- capitalize     // Transforma a inicial da palavra ou frase em maiúscula.                         
- date           // Define um formato de data para o valor do dado. Ex: date:d/m/Y       
- lower          // Transforma a palavra ou frase em minúsculo.     
- round          // Arrendonda um valor com uma precisão.  Ex: round:2    
- striptags      // Retira as tags HTML e PHP de uma string.             
- title          // Transforma as iniciais de cada palavra ou frase em maiúsculas. 
- trim           // Retira espaço no ínicio e final de uma string.
- upper          // Transforma a palavra ou frase em maiúsculas.
```

# Filtros para criptografia

``` php
- base64         // Codifica o valor para base64_encode.
- crypt          // Codifica o valor para crypt com um salt opcional. Ex: crypt:CRYPT_BLOWFISH
- md5            // Codifica o valor para md5 com um raw_output opcional. Ex: md5:true
- pw_hash        // Codifica o valor para password_hash com um cost opcional(recomendado para senha). Ex: pw_hash:8
- sha1           // Codifica o valor para sha1 om um raw_output opcional. Ex: sha1:true
```

# Licença

O filter é uma aplicação open-source licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).
