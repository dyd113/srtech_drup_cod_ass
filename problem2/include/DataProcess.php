<?php

class DataProcess{
    private $inputDataS1;
    private $inputDataS2;
    private $inputDataC;
    private $inputDataI;
    private $outputData;
    private $tempOut;

    function __construct() {
        $this->inputDataS1 = isset($_POST['inputDataS1']) ? json_decode($_POST['inputDataS1']) : [];
        $this->inputDataS2 = isset($_POST['inputDataS2']) ? json_decode($_POST['inputDataS2']) : [];
        $this->inputDataC = isset($_POST['inputDataC']) ? json_decode($_POST['inputDataC']) : [];
        $this->inputDataI = isset($_POST['inputDataI']) ? json_decode($_POST['inputDataI']) : [];
        $this->tempOut = [];
    }

    function start() {
      $this->tempOut = [];
      for($i=0;$i<count($this->inputDataS1);$i++){
        // here code processing and loginc build here
          $s1 = $this->inputDataS1[$i];
          $s2 = $this->inputDataS2[$i];
          $c = $this->inputDataC[$i];
          $ii =  $this->inputDataI[$i];
          $curr_outp = 'NO Worries';
          $str_pos = FALSE;
          if($c == 'Y' || $c == 'y'){
            $sub_str = substr($s1, $ii);
            if (preg_match("~\b".$s2."\b~",$sub_str)){
              $str_pos = strpos($sub_str, $s2, $ii);
            }
          }else{
            $str_pos = strpos($s1, $s2, $ii);
          }
          if($str_pos || $str_pos === 0){
            $curr_outp = $str_pos;
          }
          $this->tempOut[$i] = $curr_outp;
      }

      echo "<div class='center_div'> <h3>SAMPLE OUT IS :</h3> <br />";
      for($k=0;$k<count($this->tempOut);$k++){
        echo $this->tempOut[$k].'<br />';
      }
      echo '</div>';

    }
}