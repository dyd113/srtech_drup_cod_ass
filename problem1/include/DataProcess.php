<?php

class DataProcess{
    private $inputDataN;
    private $inputDataQ;
    private $tempOut;

    function __construct() {
        $this->inputDataN = isset($_POST['inputDataN']) ? json_decode($_POST['inputDataN']) : [];
        $this->inputDataQ = isset($_POST['inputDataQ']) ? json_decode($_POST['inputDataQ']) : [];
        $this->tempOut = [];
    }

    function start() {
      $this->tempOut = [];
      for($i=0;$i<count($this->inputDataQ);$i++){
        $str_q_str = str_replace("?","",$this->inputDataQ[$i]);
        $str_q_str_ctn = 0;
        for($j=0;$j<count($this->inputDataN);$j++){
            $str_pos = strpos($this->inputDataN[$j], $str_q_str);
            if($str_pos || $str_pos === 0){
              $str_q_str_ctn = $str_q_str_ctn + 1;
            }
        }
        $this->tempOut[$i] = $str_q_str_ctn;
      }

      echo "<div class='center_div'> <h3>SAMPLE OUT IS :</h3> <br />";
      for($k=0;$k<count($this->tempOut);$k++){
        echo $this->tempOut[$k].'<br />';
      }
      echo '</div>';

    }
}