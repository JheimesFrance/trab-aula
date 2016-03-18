$("#salarioForm").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();
});


function submitForm(){
    // Initiate Variables With Form Content
    var salario = $("#salario").val();

    $.ajax({
        type: "POST",
        url: "calculadora.php",
        data: "salario=" + salario,
        success : function(salarioFinal){
            formSuccess(salarioFinal)
        }
    });
    
}
function formSuccess(salarioFinal){
    
    $( "#salarioFinalwrapper" ).removeClass( "hidden" );
    
    var obj = jQuery.parseJSON(salarioFinal);
    
    //$('#salarioFinal').val(obj.salario);
    
    $("#salarioBruto").text("R$ " + obj.INSS.salarioTeto);
    $("#aliquota").text(obj.INSS.aliquota + "%");
    $("#descInss").text("R$ " + obj.INSSCalculado.descInss);
    $("#IRRF").text(obj.Ir.aliquota + "%");
    $("#deducao").text("R$ " + obj.calculaLiquidoTeste);
    //$("#total").text("R$ " + obj.INSS.salarioTeto);
    $("#totalR").text("R$ " + obj.calculaIRRF);
    $("#salario-liquido").text("R$ " + (obj.salarioFinal));
    
    
    //$("#salarioBase").text( obj.inssFinal.salarioBase);
    //$("#aliquota").text(obj.irFinal.aliquota + "%");
    //$("#deducao").text(obj.irFinal.deducao);
    //
    //$("#salarioFinal").text(obj.salarioFinal);
    
    
    console.log(obj);

   
}