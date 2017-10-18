<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
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
