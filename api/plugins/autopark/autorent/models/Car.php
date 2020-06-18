<?php namespace Autopark\Autorent\Models;

use Model;

/**
 * Model
 */
class Car extends Model
{
    use \October\Rain\Database\Traits\Validation;
    /* this are the realtions cars and places  */
    public $belongsToMany = [
        'location' => [
             'Autopark\Autorent\Models\location',
             'table' => 'autopark_autorent_auto_locat',
             'order' => 'location'
        ]
    ];
    public $attachOne = [
        'image' => 'System\Models\File'
    ];
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'autopark_autorent_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
