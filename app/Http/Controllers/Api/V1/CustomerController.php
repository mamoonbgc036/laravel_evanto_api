<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Filters\V1\CustomerQuery;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CustomerQuery();
        $queryItems = $filter->transform($request);
        // dd($queryItems);

        $invoice_query = $request->query('includesInvoices');
        // dd($queryItems);
        $customer = Customer::where($queryItems);
        if ($invoice_query) {
            $customer = $customer->with('invoices');
        }

        return new CustomerCollection($customer->paginate(10)->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $includeInvoice = Request()->query('includesInvoices');
        // dd($includeInvoice);
        if ($includeInvoice) {
            $customer = $customer->loadMissing('invoices');
        }
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCustomerRequest $request, Customer $customer)
    {
        return $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
