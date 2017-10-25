<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //
    protected $table = 'tbl_invoices';

    public function project()
    {
        return $this->belongsTo('App\Project', 'pId', 'id');
    }

}
