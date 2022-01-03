<?php

namespace Classes;

class PhoneCode {

protected $country_code = null;

   public function getPhonesData() {
   
     $country_code = $this->$country_code;
     $country_code = file_get_contents('https://gist.githubusercontent.com/emnsen/a2364b401d1cb02ac09a850a57017994/raw/bada9a4dcc6ac20428d0abfde4204bbce3f0c3f1/country-codes.json');
     
        return $country_code;
}
    public function getPhoneCodes() {
     
     $country_code = $this->getPhonesData();
     $country_code = "{ \"countries\":".$country_code."}";
     $country_code = str_replace('-', '_', $country_code);
     //$country_code = json_decode($country_code);
     
     
        return $country_code;
    }
    
}

