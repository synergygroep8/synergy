<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    //
    protected $table = 'tbl_customers';

    public function projects()
    {
        return $this->hasMany('App\Project', 'cId');
    }

    public function invoices()
    {
        return $this->hasManyThrough('App\Invoice', 'App\Project', 'Cid', 'pId');
    }

    public function getTable()
    {
        return $this->table;
    }
}
