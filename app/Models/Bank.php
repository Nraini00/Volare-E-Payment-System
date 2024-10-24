<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [ 'id',
                            'bank_code',
                            'IBG_routing_num',
                            'name',
                            'payment_id'];

}
