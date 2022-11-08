<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

use Kyslik\ColumnSortable\Sortable;

class Students extends Model
{
    use Sortable;
    use HasFactory;

    protected $table = "students";
    public $sortable = ['id', 'first_name', 'last_name', 'birth_place', 'birth_date'];

    use Searchable;
}
