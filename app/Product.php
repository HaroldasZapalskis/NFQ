<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Product extends Model
{
    use Sortable;

	public $sortable = ['first_name', 'last_name', 'email', 'created_at', 'address'];
}
