<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customerId', 'amount', 'status', 'billed_date', 'paid_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
