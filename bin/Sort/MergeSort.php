<?php
/**
 * User: antonio
 * Date: 05/04/17
 * Time: 00:21
 */

namespace Benchmark\Sort;


use Benchmark\SortInterface;

class MergeSort implements SortInterface
{

  public function sort(array $array)
  {
    if(count($array) == 1 ) return $array;
    $mid = count($array) / 2;
    $left = array_slice($array, 0, $mid);
    $right = array_slice($array, $mid);
    $left = $this->sort($left);
    $right = $this->sort($right);
    return $this->merge_sort($left, $right);
  }

  private function merge_sort($left, $right){
    $res = array();
      while (count($left) > 0 && count($right) > 0){
      if($left[0] > $right[0]){
        $res[] = $right[0];
        $right = array_slice($right , 1);
      }else{
        $res[] = $left[0];
        $left = array_slice($left, 1);
      }
    }
    while (count($left) > 0){
      $res[] = $left[0];
      $left = array_slice($left, 1);
    }
    while (count($right) > 0){
      $res[] = $right[0];
      $right = array_slice($right, 1);
    }
    return $res;
  }
}