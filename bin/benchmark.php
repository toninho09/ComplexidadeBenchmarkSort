<?php

require __DIR__ . '/../vendor/autoload.php';

$input = new \Benchmark\InputOutput();
menu1:
$input->println("Benchmark de metodos de ordenacao");
$input->println("Digite a opcao desejada:");
$input->println("1 - Insertion Sort");
$input->println("2 - Select Sort");
$input->println("3 - Merge Sort");
$input->println("4 - PHP Sort");
$input->println("0 - Sair");

$op = $input->get();
$sort;
switch ($op){
  case 1:
    $sort = new \Benchmark\Sort\InsertSort();
    break;
  case 2:
    $sort = new \Benchmark\Sort\SelectSort();
    break;
  case 3:
    $sort = new \Benchmark\Sort\MergeSort();
    break;
  case 4:
    $sort = new \Benchmark\Sort\NativeSort();
    break;
  case 0:
    return;
  default:
    $input->println("opcao invalida");
    goto menu1;
    break;
}

menu2:
$input->println("Insira o tamanho do array");
$arraySize = $input->get();
if($arraySize <= 0){
  $input->println("Valor Invalido");
  goto menu2;
}

menu3:
$input->println("Insira o numero de tentativas");
$times = $input->get();
if($times <= 0){
  $input->println("Valor Invalido");
  goto menu3;
}


menu4:
$input->println("Ativar Debugs ? (y/n)");
$activeDebug = $input->get();
if(!in_array($activeDebug, ['Y','y','N','n'])){
  $input->println("Valor Invalido");
  goto menu4;
}
$activeDebug = ($activeDebug == 'Y' || $activeDebug == 'y');

$t = new \Benchmark\TesteHandle($sort,$activeDebug);
$t->doTest( $arraySize,$times);
$t->getAverage();
$input->get();