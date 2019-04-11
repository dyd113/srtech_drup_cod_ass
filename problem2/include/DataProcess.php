<?php

class DataProcess
{

    private $inputDataS1;

    private $inputDataS2;

    private $inputDataC;

    private $inputDataI;

    private $tempOut;


    function __construct()
    {
        $this->inputDataS1 = isset($_POST['inputDataS1']) ? json_decode($_POST['inputDataS1']) : [];
        $this->inputDataS2 = isset($_POST['inputDataS2']) ? json_decode($_POST['inputDataS2']) : [];
        $this->inputDataC  = isset($_POST['inputDataC']) ? json_decode($_POST['inputDataC']) : [];
        $this->inputDataI  = isset($_POST['inputDataI']) ? json_decode($_POST['inputDataI']) : [];
        $this->tempOut     = [];

    }//end __construct()


    function start()
    {
        $this->tempOut = [];
        $ctnInpS       = count($this->inputDataS1);
        for ($i = 0; $i < $ctnInpS; $i++) {
            $s1       = $this->inputDataS1[$i];
            $s2       = $this->inputDataS2[$i];
            $c        = $this->inputDataC[$i];
            $ii       = $this->inputDataI[$i];
            $currOutp = 'NO Worries';
            $strPos   = false;
            if ($c === 'Y' || $c === 'y') {
                $subStr = substr($s1, $ii);
                if (preg_match("~\b".$s2."\b~", $subStr)) {
                    $strPos = strpos($subStr, $s2, $ii);
                }
            } else {
                $strPos = strpos($s1, $s2, $ii);
            }

            if ($strPos || $strPos === 0) {
                $currOutp = $strPos;
            }

            $this->tempOut[$i] = $currOutp;
        }//end for

        $ctnTemp = count($this->tempOut);
        echo "<div class='center_div'> <h3>SAMPLE OUT IS :</h3> <br />";
        for ($k = 0; $k < $ctnTemp; $k++) {
            echo $this->tempOut[$k].'<br />';
        }

        echo '</div>';

    }//end start()


}//end class
