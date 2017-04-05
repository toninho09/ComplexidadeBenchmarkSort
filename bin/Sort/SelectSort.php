<?php
/**
 * User: antonio
 * Date: 05/04/17
 * Time: 00:21
 */

namespace Benchmark\Sort;


use Benchmark\SortInterface;

class SelectSort implements SortInterface
{

  public function sort(array $array)
  {
    for ($i = 0; $i < count($array); $i++) {
      $min = $i;
      $length = count($array);
      for ($j = $i + 1; $j < $length; $j++) {
        if ($array[$j] < $array[$min]) {
          $min = $j;
        }
      }
      $tmp = $array[$min];
      $array[$min] = $array[$i];
      $array[$i] = $tmp;
    }
    return $array;
  }
}