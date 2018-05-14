<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      require_once app_path().'/Helpers/DataUserHelper.php';
      require_once app_path().'/Helpers/IDCryptHelper.php';
      require_once app_path().'/Helpers/TanggalHelper.php';
      require_once app_path().'/Helpers/ArrayHelper.php';
    }
}
