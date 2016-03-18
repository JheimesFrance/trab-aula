<?php


$salario = $_POST['salario'];

$inssFinal = calculaINSS($salario);//porcentagem do inss e valor de desconto

$irFinal = getIR($salario); //

$salarioFinal = calculaSalarioReceber($salario); //Salario final

$p_salario = $salario;

$p_inss = getINSS($salario);

$p_inssCalculado = calculaINSS($salario);

$p_ir = getIR($salario);

$p_calculaIR = calculaIR($salario);

$resultadoTeste = $p_inss['salarioTeto'];

$calculaLiquidoTeste = calculaLiquidoTeste($salario);

$calculaIRRF = $p_inssCalculado['descInss'] + $calculaLiquidoTeste;

$total = array("calculaIRRF" => $calculaIRRF, "calculaLiquidoTeste" => $calculaLiquidoTeste, "salario" => $p_salario, "INSS" => $p_inss, "INSSCalculado" => $p_inssCalculado, "Ir" => $p_ir, "calculaIr" => $p_calculaIR, "salarioFinal" => $salarioFinal, "totaisDesc" => $p_inss);

echo json_encode($total);

//echo $inssFinal;

/**
 * [getINSS description]
 * @param  [type] $salario [description]
 * @return [type]          [description]
 */
function getINSS($salario) {
  $inss = [];
  switch ($salario) {
    case ($salario >= 0 && $salario <= 1556.94):
      $inss['aliquota'] = 8;
      $inss['teto'] = false;
      $inss['salarioTeto'] = $salario;

      break;

    case ($salario >= 1556.95 && $salario <= 2594.92):
      $inss['aliquota'] = 9;
      $inss['teto'] = false;
      $inss['salarioTeto'] = $salario;

    break;

    case ($salario >= 2594.93):
      $inss['aliquota'] = 11;
      $inss['teto'] = true;
      if ($salario > 5189.82) {
        $inss['salarioTeto'] = 5189.82;
      } else {
          $inss['salarioTeto'] = $salario;
      }
  }

  return $inss;
}


/**
 * [getIR description]
 * @param  [type] $salario [description]
 * @return [type]          [description]
 */

function getIR($salario) {
  $ir = [];

  switch ($salario) {
    case ($salario >= 0 && $salario <= 1903.98):
      $ir['aliquota'] = 0;
      $ir['deducao'] = 0;

      break;

    case ($salario >= 1903.98 && $salario <= 2826.65):
      $ir['aliquota'] = 7.5;
      $ir['deducao'] = 142.80;

    break;

    case ($salario >= 2826.65 && $salario <= 3751.05):
      $ir['aliquota'] = 15;
      $ir['deducao'] = 354.80;

    break;

    case ($salario >= 3751.05 && $salario <= 4664.68):
      $ir['aliquota'] = 22.5;
      $ir['deducao'] = 636.13;

    break;

    case ($salario >= 4664.68):
      $ir['aliquota'] = 27.5;
      $ir['deducao'] = 869.36;

    break;
  }
  return $ir;
}

function calculaINSS($salario) {
  $inssConfig = getINSS($salario);

  $inss['salarioBase'] = $salario;
  $inss['descInss'] = 0;

  if ($inssConfig['aliquota'] != 0) {
    $inss['descInss'] = $inssConfig['salarioTeto'] * $inssConfig['aliquota']/100;
    $inss['salarioBase'] = $salario - $inss['descInss'];
  }

  return $inss;
}

function calculaIR($salarioBase) {
  $irConfig = getIR($salarioBase);
  
  //$teste = calculaINSS($salarioBase);
  $totalIR = ($salarioBase * $irConfig['aliquota']/100) - $irConfig['deducao'];
  
  return $totalIR;
}

function calculaLiquidoTeste($salarioBase) {
  $irConfig = getIR($salarioBase);

  $teste = calculaINSS($salarioBase);
  
  $total02 = ($teste['salarioBase'] * $irConfig['aliquota']/100) - $irConfig['deducao'];
  
  return $total02;
}


function calculaSalarioReceber($salario) {
  $inss = calculaINSS($salario);
  $ir = calculaIR($inss['salarioBase']);


  $salarioLiquido = $salario - $inss['descInss'] - $ir;
  
  
  return $salarioLiquido;
}

?>
