<?php

namespace App\SecondLog;

use System\Classes\PluginBase;
use App\Arrival\Models\Arrival;
use App\SecondLog\Models\Log;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'SecondLog',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-laptop'
        ];
    }

    public function boot()
{
    Arrival::extend(function($model) {
        $model->hasOne['log'] = ['App\SecondLog\Models\Log', 'key' => 'arrival_id'];

        $model->bindEvent('model.afterUpdate', function () use ($model) {
            if ($model->log) {
                $model->log->save();
            }
        });
    });
}
}