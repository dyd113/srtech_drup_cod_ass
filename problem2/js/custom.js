$(document).ready(function(){
    $("#step_1_btn").click(function(){
       $(".step_2").addClass("enable_curr");
       $(".step_1").removeClass("enable_curr");
    });
    $("#step_2_btn").click(function(){
        let t = $("#val_t").val();
        if(!t || t==0){
            alert('Please enter valid value.')
            return false;
        }
        t=parseInt(t);
        let inputHtml = ``;
        for(let i=0;i<t;i++){
            inputHtml += `
            <div class="panel panel-default">
                <h4> Test Case ${i+1}</h4>
                <div class="input-group">
                    <span class="input-group-addon">S1 </span>
                    <input type="text" class="form-control" id="val_s1_${i}" name="val_s1[]" placeholder="Enter value S1" />
                </div>
                <div class="input-group">
                <span class="input-group-addon">S2</span>
                <input type="text" class="form-control" id="val_s2_${i}" name="val_s2[]" placeholder="Enter value S2" />
                </div>
                <div class="input-group">
                <span class="input-group-addon">C</span>
                    <input type="text" class="form-control" id="val_c_${i}" name="val_c[]" placeholder="Enter value C" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon">I</span>
                <input type="text" class="form-control"  id="val_i_${i}" name="val_i[]" placeholder="Enter value I" />
                </div>   
             </div>         
            `;
        }
        $("#step3_input_wrap").html(inputHtml);
        $(".step_3").addClass("enable_curr");
        $(".step_2").removeClass("enable_curr");
     });

  

     $("#step_3_btn").click(function(){
        var values_s1 = $("input[name='val_s1[]']")
              .map(function(){return $(this).val();}).get();
        var values_s2 = $("input[name='val_s2[]']")
        .map(function(){return $(this).val();}).get();
        var values_c = $("input[name='val_c[]']")
        .map(function(){return $(this).val();}).get();
        var values_i = $("input[name='val_i[]']")
        .map(function(){return $(this).val();}).get();
        values_s1 = JSON.stringify(values_s1);
        values_s2 = JSON.stringify(values_s2);
        values_c = JSON.stringify(values_c);
        values_i = JSON.stringify(values_i);
        $("#inputDataS1").val(values_s1);
        $("#inputDataS2").val(values_s2);
        $("#inputDataC").val(values_c);
        $("#inputDataI").val(values_i);
        $("#inputSubForm").submit();
     });

});