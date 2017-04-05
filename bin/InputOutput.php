<?php
/**
 * User: antonio
 * Date: 04/04/17
 * Time: 21:38
 */

namespace Benchmark;


class InputOutput
{
  public function get(){
    return trim(fgets(STDIN));
  }

  public function println($str){
    print($str . "\n");
  }

  public function printlnJson($mixed){
    print(json_encode($mixed)."\n");
  }
}