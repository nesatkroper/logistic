<?php

use App\Models\AppSetting;

class AppSettingController
{
    private $app_name = 'AppSetting';

    public function __construct($app_name)
    {
        $this->app_name = $app_name;
    }

    public static function AppName()
    {
        $setting = AppSetting::all();
        return $setting;
    }

    public function setAppName()
    {
        $setting = AppSetting::all();
        $this->app_name = $setting->app_name;
    }

    public function getAppName()
    {
        return $this->app_name;
    }
}
