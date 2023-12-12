<?php

namespace App\SecondLog;

use System\Classes\PluginBase;
use App\Arrival\Models\Arrival;
use Log;

/**
 * SecondLog Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Arrival::creating(function ($model) {
            Log::info('Arrival is being created:', ['name' => $model->name, 'created_at' => $model->created_at]);
        });
    }

}
