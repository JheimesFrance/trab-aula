<!DOCTYPE html>
<html>
<head>
    <title>Calcule seu salário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>"
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
    <h3>Calculo de Salário</h3>
    <form role="form" id="salarioForm">
      <div class="row">
        
            <div class="form-group col-sm-6">
                <label for="salario" class="h4">Salário bruto</label>
                <p><span class="real">R$</span><input type="number" style="width: 200px;" step="any" class="form-control" id="salario" placeholder="Entre com seu salario" required></p>
            </div>

        </div>

        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-left ">Calcular</button>
    </form>
    <div id="salarioFinalwrapper" class="h3 text-center hidden">Resultado final:
        
        
        <ul class="list-group align-left">
            <li class="list-group-item">EVENTO<span class="badge"></span> <label style="float:right;">DESCONTOS</label><label class="space01" style="float:right; margin-right: 268px;">Ref.</label></li> 
            <li class="list-group-item"><span class="badge"></span><b>Salário Bruto</b><span class="badge" id="salarioBruto" style="margin-right: 375px;"></span></li> 
            <li class="list-group-item"><span class="badge" id="descInss"></span> <b>INSS</b> <span class="badge" id="aliquota" style="margin-right: 340px;"></span></li>
            <li class="list-group-item"><span class="badge" id="deducao"></span> <b>IRRF </b> <span class="badge" id="IRRF" style="margin-right: 315px;"></span></li>
            <li class="list-group-item"><span class="badge" id="totalR"></span><b>Totais de desconto</b><span class="badge" id="none" style="margin-right: 291px;"></span></li>
            <li class="list-group-item" style="color:#5CB85C;"><span class="badge" id="salario-liquido" style="background-color:#5CB85C;"></span> Salário líquido</li>
            <!--<li class="list-group-item"><span class="badge" id="salarioBase"></span> Salario Base</li> -->
            <!--<li class="list-group-item"><span class="badge" id="salarioFinal"></span> Salário Líquido</li>-->
        </ul>
    </div>
</div>
</div>
</body>
<script  type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="js/submit.js"></script>
</html>