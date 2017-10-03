<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'tbl_customers';

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function getTable()
    {
        return $this->table;
    }
}
