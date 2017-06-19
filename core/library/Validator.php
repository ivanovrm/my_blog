<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 18.06.2017
 * Time: 18:12
 */

namespace library;


class Validator
{
    protected $_errors = [];
    protected  $_rules = [];
    protected  $_fields = [];
    protected  $_data = [];

    public function __construct($data, $rules){
        $this->_rules = $rules;
        $this->_data = $data;

        $this->_fields = array_keys($rules);
    }

    protected function required($field){

        if(empty($this->_data[$field])){
            $this->addError($field, 'Field must be set!');
        }
    }

    protected function email($field){
        if(!preg_match('/^([\w\-.])+@+([\w\-]{2}+.+[a-zA-Z]{2})$/', $this->_data[$field])){
            $this->addError($field, 'email in wrong format');
        }
    }

    public function addError($field, $error){
        $this->_errors[$field] = $error;
    }

    public function getErrors(){
        return $this->_errors;
    }

    public function getError($field){

        return $this->_errors[$field];
    }

    public function validateThis(){
        foreach ($this->_rules as $field => $rules){
            foreach ($rules as $rule){
                if(method_exists($this, $rule)){
                    if(is_null($this->getError($field))){
                        $this->$rule($field);
                    }
                }else{
                    throw new \Exception('Unknow validation rule: '.$rule);
                }
            }
        }
        if(!empty($this->_errors)){
            return false;
        }

        return true;
    }
}




















