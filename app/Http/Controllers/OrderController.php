<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryBuilder = QueryBuilder::for(Order::class);
        $customers = $queryBuilder->allowedFilters(['order_no', 'order_date', 'customer_id'])
            ->allowedIncludes(['customer'])
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
    public function store(OrderRequest $request)
    {
        try {
            $order = Order::create($request->only('order_no', 'order_date', 'customer_id'));
            $this->response->setHttpCode(Response::HTTP_OK);
            $this->response->setCode($this->response->getHttpCode());
            $this->response->setMessage('Order has been created');
            $this->response->setData($order);
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setMessage('Order has been retrieved');
        $this->response->setData($order);
        return $this->response->setResponse();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        try {
            $order->update($request->only('order_no', 'order_date', 'customer_id'));
            $this->response->setHttpCode(Response::HTTP_OK);
            $this->response->setCode($this->response->getHttpCode());
            $this->response->setMessage('Order has been updated');
            $this->response->setData($order);
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setMessage('Order has been deleted');
        $this->response->setData($order);
        return $this->response->setResponse();
    }
}
