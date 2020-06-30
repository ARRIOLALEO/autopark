<?php namespace Autopark\Autorent\Models;

use Model;

/**
 * Model
 */
class Book extends Model
{
    use \October\Rain\Database\Traits\Validation;
    public $belongsToMany = [
        'tittle' => [
             'Autopark\Autorent\Models\car',
             'table' => 'autopark_autorent_book_car',
             'order' => 'id'
        ]
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'autopark_autorent_bookings';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
