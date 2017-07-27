<?php

namespace Mammoth\Filtration;


class Filter {

    
    /**
     * @var type 
     */
    
    
    private $dataFiltered;

    
    /**
     * -------------------------------------------------------------------------
     * Setando/Definindo filtros para determinados dados.
     * -------------------------------------------------------------------------
     * 
     * @param array $datas
     * @param array $filters
     */
    
    
    public function set(array &$datas, array $filters) {
        $this->dataFiltered = $datas;
        
        foreach($filters as $filterKey => $filterValue){
            if(isset($this->dataFiltered[$filterKey])){
                $this->filters($filterKey, $filterValue);
            }
        }
        
        $datas = $this->dataFiltered;
    }
    
    
    /**
     * -------------------------------------------------------------------------
     * Definindo mais de um filtro para um determinado dado.
     * -------------------------------------------------------------------------
     * 
     * @param type $filterKey
     * @param type $filterValue
     */
    
    
    private function filters($filterKey, $filterValue) {
        $conditions = explode('|', $filterValue);
        
        foreach($conditions as $condition){
             $this->filtering($condition, $filterKey);
        }
    }
    
    
    /**
     * -------------------------------------------------------------------------
     * Tipos de filtragem para os dados.
     * ------------------------------------------------------------------------- 
     * 
     * @param type $condition
     * @param type $filterKey
     */
    
    
    private function filtering($condition, $filterKey) {
        $item = explode(':', $condition);
        
        switch($item[0]){
            case 'base64_encode': 
                $this->dataFiltered[$filterKey] = base64_encode($this->dataFiltered[$filterKey]);
            break;
            case 'capitalize': 
                $this->dataFiltered[$filterKey] = ucfirst($this->dataFiltered[$filterKey]);
            break;
            case 'crypt': 
                $this->dataFiltered[$filterKey] = crypt($this->dataFiltered[$filterKey], $item[1] ?? null);
            break;
            case 'date_format': 
                $this->dataFiltered[$filterKey] = date($item[1], strtotime($this->dataFiltered[$filterKey]));
            break;
            case 'email': 
                $this->dataFiltered[$filterKey] = filter_var($this->dataFiltered[$filterKey], FILTER_SANITIZE_EMAIL);
            break;
            case 'escape': 
                $this->dataFiltered[$filterKey] = filter_var($this->dataFiltered[$filterKey], FILTER_SANITIZE_SPECIAL_CHARS);
            break;
            case 'float': 
                $this->dataFiltered[$filterKey] = filter_var($this->dataFiltered[$filterKey], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            break;
            case 'html_entities': 
                $this->dataFiltered[$filterKey] = htmlentities($this->dataFiltered[$filterKey], ENT_QUOTES, 'UTF-8');
            break;
            case 'int': 
                $this->dataFiltered[$filterKey] = filter_var($this->dataFiltered[$filterKey], FILTER_SANITIZE_NUMBER_INT);
            break;
            case 'json_encode': 
                $this->dataFiltered[$filterKey] = json_encode($this->dataFiltered[$filterKey], $item[1] ?? null);
            break;
            case 'json_decode': 
                $this->dataFiltered[$filterKey] = json_decode($this->dataFiltered[$filterKey], $item[1] ?? false);
            break;
            case 'lower': 
                $this->dataFiltered[$filterKey] = strtolower($this->dataFiltered[$filterKey]);
            break;
            case 'md5': 
                $this->dataFiltered[$filterKey] = md5($this->dataFiltered[$filterKey], $item[1] ?? false);
            break;
            case 'pw_hash':
                $this->dataFiltered[$filterKey] = password_hash($this->dataFiltered[$filterKey], PASSWORD_BCRYPT);
            break;
            case 'raw':
                $this->dataFiltered[$filterKey] = filter_var($this->dataFiltered[$filterKey], FILTER_DEFAULT);
            break;
            case 'round':
                $this->dataFiltered[$filterKey] = round($this->dataFiltered[$filterKey], $item[1] ?? null);
            break;
            case 'sha1':
                $this->dataFiltered[$filterKey] = sha1($this->dataFiltered[$filterKey], $item[1] ?? false);
            break;
            case 'sha512':
                $this->dataFiltered[$filterKey] = hash('sha512', $this->dataFiltered[$filterKey], $item[1] ?? false);
            break;
            case 'string':
                $this->dataFiltered[$filterKey] = filter_var($this->dataFiltered[$filterKey], FILTER_SANITIZE_STRING);
            break;
            case 'strip_tags':
                $this->dataFiltered[$filterKey] = strip_tags($this->dataFiltered[$filterKey], $item[1] ?? ' ');
            break;
            case 'title':
                $this->dataFiltered[$filterKey] = ucwords($this->dataFiltered[$filterKey], $item[1] ?? ' ');
            break;
            case 'trim':
                $this->dataFiltered[$filterKey] = trim($this->dataFiltered[$filterKey], $item[1] ?? ' ');
            break;
            case 'upper':
                $this->dataFiltered[$filterKey] = strtoupper($this->dataFiltered[$filterKey]);
            break;
            case 'url':
                $this->dataFiltered[$filterKey] = filter_var($this->dataFiltered[$filterKey], FILTER_SANITIZE_URL);
            break;
            case 'url_encode':
                $this->dataFiltered[$filterKey] = filter_var($this->dataFiltered[$filterKey], FILTER_SANITIZE_ENCODED);
            break;
            case 'whirlpool': 
                $this->dataFiltered[$filterKey] = hash('whirlpool', $this->dataFiltered[$filterKey], $item[1] ?? false);
            break;
            case 'whole_number': 
               $this->dataFiltered[$filterKey]  = intval($this->dataFiltered[$filterKey], $item[1] ?? 10);
            break;
        }
    }
    
} 

