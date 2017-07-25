<?php

namespace Mammoth\Filtration;


class Filter {

    private $dataReturn;

    /**
     * -------------------------------------------------------------------------
     * Setando/Definindo filtros para determinados dados.
     * -------------------------------------------------------------------------
     * 
     * @param array $datas
     * @param array $filters
     */
    
    
    public function set(array $datas, array $filters) {
        $this->dataReturn = $datas;
        foreach($filters as $filterKey => $filterValue){
            if(isset($this->dataReturn[$filterKey])){
                $this->filters($filterKey, $filterValue);
            }
        }
        return $this->dataReturn;
    }
    
    
    /**
     * -------------------------------------------------------------------------
     * Definindo mais de um filtro para um determinado dado.
     * -------------------------------------------------------------------------
     * 
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
     */
    
    
    private function filtering($condition, $filterKey) {
        $subitem = explode(':', $condition);
        
        switch($subitem[0]){
            case 'base64': 
                $this->dataReturn[$filterKey] = base64_encode($this->dataReturn[$filterKey]);
            break;
            case 'capitalize': 
               $this->dataReturn[$filterKey] = ucfirst($this->dataReturn[$filterKey]);
            break;
            case 'crypt': 
               $this->dataReturn[$filterKey] = crypt($this->dataReturn[$filterKey], $subitem[1] = NULL);
            break;
            case 'date': 
               $this->dataReturn[$filterKey] = date($subitem[1], strtotime($this->dataReturn[$filterKey]));
            break;
            case 'email': 
               $this->dataReturn[$filterKey] = filter_var($this->dataReturn[$filterKey], FILTER_SANITIZE_EMAIL);
            break;
            case 'float': 
               $this->dataReturn[$filterKey] = filter_var($this->dataReturn[$filterKey], FILTER_SANITIZE_NUMBER_FLOAT, $subitem[1] = NULL);
            break;
            case 'int': 
               $this->dataReturn[$filterKey] = filter_var($this->dataReturn[$filterKey], FILTER_SANITIZE_NUMBER_INT);
            break;
            case 'lower': 
               $this->dataReturn[$filterKey] = strtolower($this->dataReturn[$filterKey]);
            break;
            case 'md5': 
               $this->dataReturn[$filterKey] = md5($this->dataReturn[$filterKey], $subitem[1]  = NULL);
            break;
            case 'pw_hash':
                $this->dataReturn[$filterKey] = password_hash($this->dataReturn[$filterKey], PASSWORD_BCRYPT, $subitem[1]  = NULL);
            break;
            case 'raw':
                $this->dataReturn[$filterKey] = filter_var($this->dataReturn[$filterKey], FILTER_DEFAULT, $subitem[1]  = NULL);
            break;
            case 'round':
                $this->dataReturn[$filterKey] = round($this->dataReturn[$filterKey], $subitem[1]  = NULL);
            break;
            case 'sha1':
                $this->dataReturn[$filterKey] = sha1($this->dataReturn[$filterKey], $subitem[1]  = NULL);
            break;
            case 'string':
                $this->dataReturn[$filterKey] = filter_var($this->dataReturn[$filterKey], FILTER_SANITIZE_STRING, $subitem[1]  = NULL);
            break;
            case 'striptags':
                $this->dataReturn[$filterKey] = strip_tags($this->dataReturn[$filterKey], $subitem[1]  = NULL);
            break;
            case 'title':
                $this->dataReturn[$filterKey] = ucwords($this->dataReturn[$filterKey], $subitem[1]  = NULL);
            break;
            case 'trim':
                $this->dataReturn[$filterKey] = trim($this->dataReturn[$filterKey], $subitem[1]  = NULL);
            break;
            case 'upper':
                $this->dataReturn[$filterKey] = strtoupper($this->dataReturn[$filterKey]);
            break;
            case 'url':
                $this->dataReturn[$filterKey] = filter_var($this->dataReturn[$filterKey], FILTER_SANITIZE_URL);
            break;
            case 'url_encode':
                $this->dataReturn[$filterKey] = filter_var($this->dataReturn[$filterKey], FILTER_SANITIZE_ENCODED, $subitem[1] = NULL);
            break;
        }
    }
    
} 

