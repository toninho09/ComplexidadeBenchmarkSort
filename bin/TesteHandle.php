<?php
/**
 * User: antonio
 * Date: 05/04/17
 * Time: 00:39
 */

namespace Benchmark;


class TesteHandle
{
  protected $sort;
  protected $results;
  protected $input;
  protected $debug;

  public function __construct(SortInterface $sort,$debug = false)
  {
    $this->sort = $sort;
    $this->results = [];
    $this->input = new InputOutput();
    $this->debug = $debug;
  }

  public function doTest($sizeArray, $times = 1)
  {
    for ($i = 0; $i < $times; $i++) {
      $test = new Test($this->sort);
      $test->setDataSize($sizeArray);
      $test->generateData();
      if($this->debug) $this->input->printlnJson($test->getData());
      $result = $test->doTest();
      if($this->debug) $this->input->printlnJson($test->getData());
      $this->showResults($i+1 ,$result);
      $this->results[] = $result;
    }
  }

  public function getAverage()
  {
    $average = 0;
    /**@var $result \Ubench; */
    foreach ($this->results as $key => $result) {
      $average += $result->getTime(true);
    }
    $average = $average / count($this->results);
    $this->input->println("Media dos Tempos : ".\Ubench::readableElapsedTime($average));
  }

  public function showResults($key,\Ubench $result){
    $this->input->println("Teste #$key - Tempo : ". $result->getTime() ." - Consumo de memoria : ". $result->getMemoryUsage());
  }
}