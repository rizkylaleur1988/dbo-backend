<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryBuilder = QueryBuilder::for(Customer::class);
        $customers = $queryBuilder->allowedFilters(['name', 'email', 'address', 'phone'])
            ->paginate()
            ->appends(request()->query());
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setData($customers);
        return $this->response->setResponse();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        try {
            $customer = Customer::create($request->only('name', 'email', 'address', 'phone'));
            $this->response->setHttpCode(Response::HTTP_OK);
            $this->response->setCode($this->response->getHttpCode());
            $this->response->setMessage('Customer has been created');
            $this->response->setData($customer);
        } catch (\Throwable $th) {
            $this->response->setHttpCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            $this->response->setCode($th->getCode());
            $this->response->setMessage($th->getMessage());
        }
        return $this->response->setResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setMessage('Customer has been retrieved');
        $this->response->setData($customer);
        return $this->response->setResponse();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        try {
            $customer->update($request->only('name', 'email', 'address', 'phone'));
            $this->response->setHttpCode(Response::HTTP_OK);
            $this->response->setCode($this->response->getHttpCode());
            $this->response->setMessage('Customer has been updated');
            $this->response->setData($customer);
        } catch (\Throwable $th) {
            $this->response->setHttpCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            $this->response->setCode($th->getCode());
            $this->response->setMessage($th->getMessage());
        }
        return $this->response->setResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setMessage('Customer has been deleted');
        $this->response->setData($customer);
        return $this->response->setResponse();
    }
}
