# Filter

O Filter é uma classe de filtragem baseada em PHP-7 que permite filtrar quaisquer dados simples e fácil.

# Instalação

via composer.

```
$ composer require mammoth-php/filter
``` 

# Exemplo de Filtragem dos dados

` Dados `

``` php
$datas = [
   'nome'  => ' mammoth ',
   'email' => ' Mammoth.Support@Web.com ',
   'senha' => ' mammoth.web '
];
```

` Filtros `

``` php
$filters = [
   'nome'  => 'trim|capitalize',
   'email' => 'trim|lower|email',
   'senha' => 'trim|pw_hash'
];
 ```
 
 ` Filtrando(desinfetando e/ou convertendo) os dados de acordo com os filtros `
 
 ``` php
   $filter = new Mammoth\Filtration\Filter();

   $filter->set($datas, $filters);
   
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
    
    echo 'Dados sem filtros: <br />';
    var_dump($datas);
    
    $filter->set($datas, [
        'nome'  => 'trim|capitalize',
        'email' => 'trim|lower|email',
        'senha' => 'trim|pw_hash'
    ]);
    
    echo 'Dados com filtros: <br />';
    var_dump($datas);
```

# Tipos de filtros (sanitizers)

* email:          ` Remove todos os caracteres, exceto letras, dígitos e ! # $% & '* + - =? ^ _ {|} ~ @. [] .` 
* escape:         ` Remove '"<> & e caracteres com valor ASCII inferior a 32, além de codificar outros caracteres. `
* float:          ` Remove todos os caracteres, exceto os dígitos, + - e, opcionalmente , eE .`  
* html_entities:  ` Converte todos os caracteres aplicáveis em entidades html. `
* int:            ` Remove todos os caracteres, exceto dígitos, sinal de mais e menos. `
* string:         ` Etiquetas de tira, opcionalmente tira ou codifica caracteres especiais. ` 
* url:            ` Remove todos os caracteres, exceto letras, dígitos e $ -_. +! * '(), {} | \\ ^ ~ [] <> #%"; /?: @ & = .`  
* url_encode:     ` Cadeia de codificação de URL, opcionalmente tira ou codifica caracteres especiais. `
* raw:            ` Não faça nada, tira ou codifica caracteres especiais. `

# Outros filtros

* capitalize:     ` Transforma a inicial da palavra ou frase em maiúscula. `                         
* date_format:    ` Define um formato de data para o valor do dado. ` `Ex: date_format:d/m/Y `
* json_encode:    ` Retorna a representação JSON de um valor com uma constante opcional inteira. ` `Ex: json_encode:8` 
* json_decode:    ` Analisa a string codificada JSON e converte-a em uma variável do PHP. ` `Ex: json_decode:true`
* lower:          ` Transforma a palavra ou frase em minúsculo. `    
* round:          ` Arrendonda um valor com uma precisão. `  `Ex: round:2  `  
* strip_tags:     ` Retira as tags HTML e PHP de uma string.  ` `Ex: strip_tags:<br>`        
* title:          ` Transforma as iniciais de cada palavra ou frase em maiúsculas com um delimitador opcional. ` `Ex: title:_ `
* trim:           ` Retira espaço no ínicio e final de uma string com mascara de caracteres opcional. ` `Ex: trim:\t`
* upper:          ` Transforma a palavra ou frase em maiúsculas. `
* whole_number:   ` Retorna o valor inteiro da variável com uma base de conversão opcional. ` `Ex: whole_number:8`

# Filtros para criptografia

* base64_encode:  ` Codifica o valor para base64_encode. `
* crypt:          ` Codifica o valor para crypt com um salt opcional.` `Ex: crypt:_J9..rasm' `
* md5:            ` Codifica o valor para md5 com um raw_output opcional.` `Ex: md5:true `
* pw_hash:        ` Codifica o valor para password_hash com o salt padrão PASSWORD_BCRYPT.`
* sha1:           ` Codifica o valor para sha1 com um raw_output opcional.` `Ex: sha1:true `
* sha512:         ` Codifica o valor para sha512 com um raw_output opcional.` `Ex: sha512:true `
* whirlpool:      ` Codifica o valor para whirlpool com um raw_output opcional. ` `Ex: whirlpool:true `

# Licença

O filter é uma aplicação open-source licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).
