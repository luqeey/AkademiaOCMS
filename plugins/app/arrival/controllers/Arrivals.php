<?php 
namespace App\Arrival\controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Arrivals Back-end Controller
 */
class Arrivals extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('App.Arrival', 'arrival', 'arrivals');
    }
}
