<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // Variables availaboe to every game

    public $players = ['Blue', 'Red'];
    public $rows = 6;
    public $columns = 7;
}
