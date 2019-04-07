$(document).ready(function(){
    $("#step_1_btn").click(function(){
       $(".step_2").addClass("enable_curr");
       $(".step_1").removeClass("enable_curr");
    });
    $("#step_2_btn").click(function(){
        let n = $("#val_n").val();
        let m = $("#val_m").val();
        if(!n || !m || n==0 || m==0){
            alert('Please enter valid value.')
            return false;
        }
        n=parseInt(n);
        m=parseInt(m);
        let inputHtml = ``;
        for(let i=0;i<n;i++){
            inputHtml += `
            <div class="input-group">
                <span class="input-group-addon">N ${i+1}</span>
                <input type="text" class="form-control" maxlength="${m}" id="val_n_${i}" name="val_n[]" placeholder="Enter value ${i+1}" />
            </div>
            `;
        }
        $("#step3_input_wrap").html(inputHtml);
        $(".step_3").addClass("enable_curr");
        $(".step_2").removeClass("enable_curr");
     });

     $("#step_3_btn").click(function(){
        $(".step_4").addClass("enable_curr");
        $(".step_3").removeClass("enable_curr");
     });

     $("#step_4_btn").click(function(){
        let q = $("#val_q").val();
        let m = $("#val_m").val();
        if(!q || q==0){
            alert('Please enter valid value.')
            return false;
        }
        q=parseInt(q);
        let inputHtml = ``;
        for(let i=0;i<q;i++){
            inputHtml += `
            <div class="input-group">
                <span class="input-group-addon">Q ${i+1}</span>
                <input type="text" class="form-control" maxlength="${m}" id="val_q_${i}" name="val_q[]" placeholder="Enter value ${i+1}" />
            </div>
            `;
        }
        $("#step5_input_wrap").html(inputHtml);
        $(".step_5").addClass("enable_curr");
        $(".step_4").removeClass("enable_curr");
     });

     $("#step_5_btn").click(function(){
        var values_n = $("input[name='val_n[]']")
              .map(function(){return $(this).val();}).get();
        var values_q = $("input[name='val_q[]']")
        .map(function(){return $(this).val();}).get();
        values_n = JSON.stringify(values_n);
        values_q = JSON.stringify(values_q);
        $("#inputDataN").val(values_n);
        $("#inputDataQ").val(values_q);
        $("#inputSubForm").submit();
     });

});