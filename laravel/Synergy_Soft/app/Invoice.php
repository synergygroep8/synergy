<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = 'tbl_invoices';

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
