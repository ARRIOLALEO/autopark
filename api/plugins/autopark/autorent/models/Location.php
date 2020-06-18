<?php namespace Autopark\Autorent\Models;

use Model;

/**
 * Model
 */
class Location extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'autopark_autorent_location';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
