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
      $this->tempOut = [11,'NO Worries', '19'];
      for($i=0;$i<count($this->inputDataS1);$i++){
        // here code processing and loginc build here
      }

      echo "<div class='center_div'> <h3>SAMPLE OUT IS :</h3> <br />";
      for($k=0;$k<count($this->tempOut);$k++){
        echo $this->tempOut[$k].'<br />';
      }
      echo '</div>';

    }
}