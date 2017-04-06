<?php
/**
 * User: antonio
 * Date: 05/04/17
 * Time: 00:15
 */

namespace Benchmark;


class Test
{
  /**
   * @var SortInterface
   */
  protected $sort;
  protected $data;
  protected $dataSize;

  /**
   * Test constructor.
   * @param SortInterface $sort
   */
  public function __construct(SortInterface $sort)
  {
    $this->sort = $sort;
  }

  public function setDataSize($size){
    $this->dataSize = $size;
  }

  public function generateData(){
    $this->data = [];
    for($i = 0; $i < $this->dataSize; $i++){
      $this->data[] = rand(0,$this->dataSize);
    }
  }

  public function getData(){
    return $this->data;
  }

  /**
   * @return \Ubench
   */
  public function doTest(){
    $ubench = new \Ubench();
    $ubench->start();
    $this->data = $this->sort->sort($this->data);
    $ubench->end();
    return $ubench;
  }
}