<?php

namespace Mammoth\Filtration;


class Filter {

    
    /**
     * @var type 
     */
    
    
    private $data_filtered;

    
    /**
     * -------------------------------------------------------------------------
     * Setando/Definindo filtros para determinados dados.
     * -------------------------------------------------------------------------
     * 
     * @param array $datas
     * @param array $filters
     */
    
    
    public function set(array &$datas, array $filters) {
        $this->data_filtered = $datas;
        
        foreach($filters as $filter_key => $filter_value){
            if(isset($this->data_filtered[$filter_key])){
                $this->filters($filter_key, $filter_value);
            }
        }
        
        $datas = $this->data_filtered;
    }
    
    
    /**
     * -------------------------------------------------------------------------
     * Definindo mais de um filtro para um determinado dado.
     * -------------------------------------------------------------------------
     * 
     * @param type $filter_key
     * @param type $filter_value
     */
    
    
    private function filters($filter_key, $filter_value) {
        $conditions = explode('|', $filter_value);
        
        foreach($conditions as $condition){
             $this->filtering($condition, $filter_key);
        }
    }
    
    
    /**
     * -------------------------------------------------------------------------
     * Tipos de filtragem para os dados.
     * ------------------------------------------------------------------------- 
     * 
     * @param type $condition
     * @param type $filter_key
     */
    
    
    private function filtering($condition, $filter_key) {
        $item = explode(':', $condition);
        
        switch($item[0]){
            case 'base64_encode': 
                $this->data_filtered[$filter_key] = base64_encode($this->data_filtered[$filter_key]);
            break;
            case 'capitalize': 
                $this->data_filtered[$filter_key] = ucfirst($this->data_filtered[$filter_key]);
            break;
            case 'crypt': 
                $this->data_filtered[$filter_key] = crypt($this->data_filtered[$filter_key], $item[1] ?? NULL);
            break;
            case 'date_format': 
                $this->data_filtered[$filter_key] = date($item[1], strtotime($this->data_filtered[$filter_key]));
            break;
            case 'email': 
                $this->data_filtered[$filter_key] = filter_var($this->data_filtered[$filter_key], FILTER_SANITIZE_EMAIL);
            break;
            case 'escape': 
                $this->data_filtered[$filter_key] = filter_var($this->data_filtered[$filter_key], FILTER_SANITIZE_SPECIAL_CHARS);
            break;
            case 'float': 
                $this->data_filtered[$filter_key] = filter_var($this->data_filtered[$filter_key], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            break;
            case 'html_entities': 
                $this->data_filtered[$filter_key] = htmlentities($this->data_filtered[$filter_key], ENT_QUOTES, 'UTF-8');
            break;
            case 'int': 
                $this->data_filtered[$filter_key] = filter_var($this->data_filtered[$filter_key], FILTER_SANITIZE_NUMBER_INT);
            break;
            case 'json_encode': 
                $this->data_filtered[$filter_key] = json_encode($this->data_filtered[$filter_key], $item[1] ?? NULL);
            break;
            case 'json_decode': 
                $this->data_filtered[$filter_key] = json_decode($this->data_filtered[$filter_key], $item[1] ?? FALSE);
            break;
            case 'lower': 
                $this->data_filtered[$filter_key] = strtolower($this->data_filtered[$filter_key]);
            break;
            case 'md5': 
                $this->data_filtered[$filter_key] = md5($this->data_filtered[$filter_key], $item[1] ?? FALSE);
            break;
            case 'pw_hash':
                $this->data_filtered[$filter_key] = password_hash($this->data_filtered[$filter_key], PASSWORD_BCRYPT);
            break;
            case 'raw':
                $this->data_filtered[$filter_key] = filter_var($this->data_filtered[$filter_key], FILTER_DEFAULT);
            break;
            case 'round':
                $this->data_filtered[$filter_key] = round($this->data_filtered[$filter_key], $item[1] ?? NULL);
            break;
            case 'sha1':
                $this->data_filtered[$filter_key] = sha1($this->data_filtered[$filter_key], $item[1] ?? FALSE);
            break;
            case 'sha512':
                $this->data_filtered[$filter_key] = hash('sha512', $this->data_filtered[$filter_key], $item[1] ?? FALSE);
            break;
            case 'string':
                $this->data_filtered[$filter_key] = filter_var($this->data_filtered[$filter_key], FILTER_SANITIZE_STRING);
            break;
            case 'strip_tags':
                $this->data_filtered[$filter_key] = strip_tags($this->data_filtered[$filter_key], $item[1] ?? ' ');
            break;
            case 'title':
                $this->data_filtered[$filter_key] = ucwords($this->data_filtered[$filter_key], $item[1] ?? ' ');
            break;
            case 'trim':
                $this->data_filtered[$filter_key] = trim($this->data_filtered[$filter_key], $item[1] ?? ' ');
            break;
            case 'upper':
                $this->data_filtered[$filter_key] = strtoupper($this->data_filtered[$filter_key]);
            break;
            case 'url':
                $this->data_filtered[$filter_key] = filter_var($this->data_filtered[$filter_key], FILTER_SANITIZE_URL);
            break;
            case 'url_encode':
                $this->data_filtered[$filter_key] = filter_var($this->data_filtered[$filter_key], FILTER_SANITIZE_ENCODED);
            break;
            case 'whirlpool': 
                $this->data_filtered[$filter_key] = hash('whirlpool', $this->data_filtered[$filter_key], $item[1] ?? FALSE);
            break;
            case 'whole_number': 
               $this->data_filtered[$filter_key]  = intval($this->data_filtered[$filter_key], $item[1] ?? 10);
            break;
        }
    }
    
} 

