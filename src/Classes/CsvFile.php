<?php

namespace Classes;


class CsvFile{

    public function reading() {
     
     $csv = array_map('str_getcsv', file(__DIR__ . '/../../public/cdrs.csv'));
    
       return $csv;
    }
    
}
