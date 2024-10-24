<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    protected $table = 'debtors';
    protected $fillable = [ 'id',
                            'no_ic',
                            'name',
                            'address',
                            'phone_number',
                            'loan_type',
                            'loan_amount',
                            'loan_date_start',
                            'loan_date_end',
                            'duration',
                            'total_amount',
                            'gender',
                            'status',
                            'payment_id',
                            'collector_id'];

    public function collector()
    {
        return $this->belongsTo(Collector::class);
    }
}
