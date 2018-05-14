<?php

namespace App\Helpers;

use Carbon\Carbon;

class TanggalHelper
{
  public static function Input($Carbon)
  {
    return Carbon::parse($Carbon)->format('Y-m-d');
  }

  public static function Output($Carbon)
  {
    $ArrayBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $Tanggal = Carbon::parse($Carbon)->format('d');
    $Bulan   = $ArrayBulan[Carbon::parse($Carbon)->format('n')-1];
    $Tahun   = Carbon::parse($Carbon)->format('Y');

    return $Tanggal.' '.$Bulan.' '.$Tahun;
  }
}
