<?php
/**
 * User: antonio
 * Date: 07/04/17
 * Time: 20:11
 */

namespace Benchmark\Sort;


use Benchmark\SortInterface;

class NativeSort implements SortInterface
{

  public function sort(array $array)
  {
    sort($array);
    return $array;
  }
}