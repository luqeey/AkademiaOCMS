<?php

namespace App\Arrival;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Arrival',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerPermissions()
    {
        return [
            'app.arrival.some_permission' => [
                'tab'   => 'Arrival',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'arrival' => [
                'label'       => 'Arrival',
                'url'         => Backend::url('app/arrival/arrivals'),
                'icon'        => 'icon-leaf',
                'permissions' => ['app.arrival.*'],
                'order'       => 500,
            ],
        ];
    }


}
