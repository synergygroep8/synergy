<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'tbl_projects';

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'Cid');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'pId', 'id');
    }
}
