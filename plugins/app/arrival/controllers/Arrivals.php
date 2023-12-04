<?php 
namespace App\Arrival\Controllers;

use Backend\Classes\Controller;

Class Arrivals extends Controller 
{
    public $implement = ['Backend\Behaviors\ListController'];
    public $listConfig = 'config_list.yaml';

}

?>