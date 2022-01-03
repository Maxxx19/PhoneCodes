<?php

namespace Classes;


class CsvFile{

protected $phone_code;

    public function reading() {
     
     $csv = array_map('str_getcsv', file(__DIR__ . '/../../public/cdrs.csv'));
    
       return $csv;
    }
    public function getPhoneCode() {
    
     
     $csv = array_map('str_getcsv', file(__DIR__ . '/../../public/cdrs.csv'));
    
       return $csv;
    }
}
