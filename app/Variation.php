<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
     protected $table = 'variation';
    protected $guarded = [ 'id', 'created_at', 'updated_at' ];
}
