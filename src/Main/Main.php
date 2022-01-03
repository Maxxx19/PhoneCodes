<?php

namespace Main;

class Main {
     private $count_same_continent;
     private $duration_same_continent;
     private $count_all_calls;
     private $duration_all_calls;
     private $continent;
     private $country;
     private $continent_in;
     private $i;
     private $j;
     private $k;
     private $response;


    public function printData(array $csv,$country_code) {
    
     $count_same_continent = $this->$count_same_continent;
     $duration_same_continent = $this->$duration_same_continent;
     $count_all_calls = $this->$count_all_calls;
     $duration_all_calls = $this->$duration_all_calls;
     $continent = $this->$continent;
     $country = $this->$country;
     $continent_in = $this->$continent_in;
     $i = $this->$i;
     $i = 3;
     $j = $this->$j;
     $j = 0;
     $k = $this->$k;
     $k = 0;
     $response = $this->$response;
     $response = [];
     $country_code = json_decode($country_code);
       
      foreach ($csv as $key=>$value) {
    
       $phone = substr($value[3],0,$i);
       $phone2 = substr($value[3],0,$i-1);
       $phone3 = substr($value[3],0,$i-2);

       foreach ($country_code->countries as $data) {
        if(!array_key_exists($value[0],$response)){
        $response_new = array($value[0] => ['count_same_continent'=> 0,'duration_same_continent'=> 0,'count_all_calls'=> 0, 'duration_all_calls'=> 0 ]);
        $response = $response + $response_new;
        //array_push($response, $value[0]);
        }
        if ($data->phone_code == $phone || $data->phone_code == $phone2 || $data->phone_code == $phone3) {
         $k++;
         $continent_in = $data->continent;
         $country = $data->country_name;
         if($j == 0){
         $j++;
         $ip = $value[4];
         $continent_from = $this->getContinent($ip);
         
         }
         if($continent_in == $continent_from){
           $response[$value[0]]['count_same_continent']++;
           $response[$value[0]]['duration_same_continent']+= $value[2];
         }
         break;
        }
         
       }
        $response[$value[0]]['count_all_calls']++;
        $response[$value[0]]['duration_all_calls'] += $value[2];
 
     }
    
     return $response;
    }
    
     public function getContinent($ip) {
         $continent_data = json_decode(file_get_contents('http://api.ipstack.com/'.$ip.'?access_key=683baabe55249ea6fc1fa4985213fd70'));
         $continent_from = $continent_data->continent_name;
         return $continent_from;
     }
}
