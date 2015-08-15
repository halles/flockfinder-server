<?php

namespace App\Models;

use Jenssegers\Mongodb\Model as Eloquent;

class Report extends Eloquent
{
    protected $collection = 'reports';
}
