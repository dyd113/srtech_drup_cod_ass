<!DOCTYPE html>
<html lang="en">
<head>
  <title>Problem 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
</head>
<body>

<?php
include 'include/DataProcess.php';
$dataProcess = new DataProcess();
if(!empty($_POST)){
    $dataProcess->start();
}else{
?>

<div class="container">
    <div class="steps step_1 center_div enable_curr">
       <button type="button" class="btn btn-primary btn-lg" id="step_1_btn">Start</button>
    </div>
    <div class="steps step_2 center_div">
        <div class="input-group">
            <span class="input-group-addon">N</span>
            <input type="number" class="form-control" id="val_n" name="val_n" placeholder="Enter value N" />
        </div>
        <div class="input-group">
            <span class="input-group-addon">M</span>
           <input type="number" class="form-control" id="val_m" name="val_m" placeholder="Enter value M" />
        </div>
        <button type="button" class="btn btn-primary btn-lg" id="step_2_btn">Submit</button>
    </div>
    <div class="steps step_3 center_div">
    <div id="step3_input_wrap">

    </div>
    <button type="button" class="btn btn-primary btn-lg" id="step_3_btn">Submit</button>
    </div> 
    
    <div class="steps step_4 center_div">
        <div class="input-group">
            <span class="input-group-addon">Q</span>
            <input type="number" class="form-control" id="val_q" name="val_q" placeholder="Enter value Q" />
        </div>
        <button type="button" class="btn btn-primary btn-lg" id="step_4_btn">Submit</button>
    </div>
    
    <div class="steps step_5 center_div">
    <div id="step5_input_wrap">

    </div>
    
    <button type="button" class="btn btn-primary btn-lg" id="step_5_btn">Submit</button>
    </div> 

    <div class="steps step_6 center_div">
        <form action="index.php" id="inputSubForm" method="POST">
            <input type="hidden"  id="inputDataN" name="inputDataN" value="">
            <input type="hidden" id="inputDataQ" name="inputDataQ" value="">
        </form>
    </div>
</div>
<?php } ?>
</body>
</html>
