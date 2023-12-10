<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

// use Illuminate\Http\Request;

class InvoiceQuery extends ApiFilter
{
    protected $safeParams = [
        'customer_id' => ['eq', 'gt', 'lt'],
        'amount' => ['eq', 'lt', 'gt'],
        'status' => ['eq', 'ne'],
        'billed_date' => ['eq', 'gt', 'lt'],
        'paid_date' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'ne' => '!='
    ];

    protected $columMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];
}
