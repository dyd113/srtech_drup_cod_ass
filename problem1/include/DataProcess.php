<?php

/**
 * {@inheritdoc}
 */
class DataProcess
{

    /**
     * @var
     */
    private $inputDataN;

    private $inputDataQ;

    private $tempOut;


    /**
     * inheritdoc{@}
     * __construct
     */
    function __construct()
    {
        $this->inputDataN = isset($_POST['inputDataN']) ? json_decode($_POST['inputDataN']) : [];
        $this->inputDataQ = isset($_POST['inputDataQ']) ? json_decode($_POST['inputDataQ']) : [];
        $this->tempOut    = [];

    }//end __construct()


    /**
     * {@inheritdoc}
     */
    function start()
    {
        $this->tempOut = [];
        $ctnInp        = count($this->inputDataQ);
        for ($i = 0; $i < $ctnInp; $i++) {
            $strQstr    = str_replace('?', '', $this->inputDataQ[$i]);
            $strQstrCtn = 0;
            $ctnInpN    = count($this->inputDataN);
            for ($j = 0; $j < $strQstrCtn; $j++) {
                $strPos = strpos($this->inputDataN[$j], $strQstr);
                if ($strPos || $strPos === 0) {
                    $strQstrCtn = $strQstrCtn++;
                }
            }

            $this->tempOut[$i] = $strQstrCtn;
        }

        $ctnTemp = count($this->tempOut);
        echo "<div class='center_div'> <h3>SAMPLE OUT IS :</h3> <br />";
        for ($k = 0; $k < $ctnTemp; $k++) {
            echo $this->tempOut[$k].'<br />';
        }

        echo '</div>';

    }//end start()


}//end class
