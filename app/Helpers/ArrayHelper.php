<?php

namespace App\Helpers;

class ArrayHelper
{
  public static function SearchValue($Array, $Key)
  {
    foreach ($Array as $DataArray) {
      if ($DataArray == $Key) {
        return true;
      }
    }
    return false;
  }
}
