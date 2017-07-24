<?php

namespace Mammoth\Filtration;


class Filter {

    
    /**
     * -------------------------------------------------------------------------
     * Setando/Definindo regras para determinados dados.
     * -------------------------------------------------------------------------
     * 
     * @param array $datas
     * @param array $filters
     */
    
    
    public function set(array $datas, array $filters) {
        foreach($filters as $filterKey => $filterValue){
            if(isset($datas[$filterKey])){
                $this->filters($datas[$filterKey], $filterValue);
            }
        }
    }
    
    
    /**
     * -------------------------------------------------------------------------
     * Definindo mais de uma regra para um determinado dado.
     * -------------------------------------------------------------------------
     * 
     * @param type $data
     * @param type $filterValue
     */
    
    
    private function filters($data, $filterValue) {
        $conditions = explode('|', $filterValue);
        
        foreach($conditions as $condition){
            $this->filtering($condition, $data);
        }
    }
    
    
    /**
     * -------------------------------------------------------------------------
     * Regras de validação para os dados.
     * ------------------------------------------------------------------------- 
     * 
     * @param type $condition
     * @param type $data
     */
    
    
    private function filtering($condition, $data) {
        $subitem = explode(':', $condition);
        
        switch($subitem[0]){
            case 'base64': 
               return base64_encode($data);
            break;
            case 'capitalize': 
               return ucfirst($data);
            break;
            case 'crypt': 
               return crypt($data, $subitem[1] = NULL);
            break;
            case 'date': 
               return date($subitem[1], strtotime($data));
            break;
            case 'email': 
               return filter_var($data, FILTER_SANITIZE_EMAIL);
            break;
            case 'float': 
               return filter_var($data, FILTER_SANITIZE_NUMBER_FLOAT);
            break;
            case 'int': 
               return filter_var($data, FILTER_SANITIZE_NUMBER_INT);
            break;
            case 'lower': 
               return strtolower($data);
            break;
            case 'md5': 
               return md5($data, $subitem[1]  = NULL);
            break;
            case 'pw_hash':
                return password_hash($data, PASSWORD_BCRYPT, $subitem[1]  = NULL);
            break;
            case 'raw':
                return filter_var($data, FILTER_DEFAULT);
            break;
            case 'round':
                return round($data, $subitem[1]  = NULL);
            break;
            case 'sha1':
                return sha1($data, $subitem[1]  = NULL);
            break;
            case 'string':
                return filter_var($data, FILTER_SANITIZE_STRING);
            break;
            case 'striptags':
                return strip_tags($data, $subitem[1]  = NULL);
            break;
            case 'title':
                return ucwords($data, $subitem[1]  = NULL);
            break;
            case 'trim':
                return trim($data, $subitem[1]  = NULL);
            break;
            case 'upper':
                return strtoupper($data);
            break;
            case 'url':
                return filter_var($data, FILTER_SANITIZE_URL);
            break;
        }
    }
    
} 

