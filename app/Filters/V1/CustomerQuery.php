<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

// use Illuminate\Http\Request;

class CustomerQuery extends ApiFilter
{
    protected $safeParams = [
        'name' => ['eq'],
        'city' => ['eq'],
        'type' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt'],
        'email' => ['eq'],
        'address' => ['eq']
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<='
    ];

    protected $columMap = [
        'postalCode' => 'postal_code'
    ];
}
