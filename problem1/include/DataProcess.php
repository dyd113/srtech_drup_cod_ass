<?php

class DataProcess{
    private $inputDataN;
    private $inputDataQ;
    private $outputData;
    private $tempOut;

    function __construct() {
        $this->inputDataN = isset($_POST['inputDataN']) ? json_decode($_POST['inputDataN']) : [];
        $this->inputDataQ = isset($_POST['inputDataQ']) ? json_decode($_POST['inputDataQ']) : [];
        $this->tempOut = [];
    }

    function start() {
      $this->tempOut = [2,2,4,2];
      for($i=0;$i<count($this->inputDataQ);$i++){
        for($j=0;$j<count($this->inputDataN);$j++){
            // here porcess is and push to temp out
        }
      }

      echo "<div class='center_div'> <h3>SAMPLE OUT IS :</h3> <br />";
      for($k=0;$k<count($this->tempOut);$k++){
        echo $this->tempOut[$k].'<br />';
      }
      echo '</div>';

    }
}