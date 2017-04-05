<?php
/**
 * User: antonio
 * Date: 05/04/17
 * Time: 00:18
 */

namespace Benchmark\Sort;


use Benchmark\SortInterface;

class InsertSort implements SortInterface
{

  public function sort(array $array)
  {
    $length = count($array);
    for ($i = 1; $i < $length; $i++) {
      $element = $array[$i];
      $j = $i;
      while ($j > 0 && $array[$j - 1] > $element) {
        $array[$j] = $array[$j - 1];
        $j = $j - 1;
      }
      $array[$j] = $element;
    }
    return $array;
  }
}