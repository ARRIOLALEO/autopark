<?php namespace Autopark\Autorent\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Location extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Autopark.Autorent', 'main-menu-item', 'side-menu-item');
    }
}
