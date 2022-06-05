<?php

namespace App\Http\Requests;

use App\Helpers\ResponseHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class OrderRequest extends FormRequest
{
    private $response;

    public function __construct()
    {
        $this->response = new ResponseHelper;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_no' => ['required'],
            'order_date' => ['required', 'date_format:Y-m-d'],
            'customer_id' => ['required', 'exists:customers,id'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->response->setHttpCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setMessage($validator->errors());
        throw new HttpResponseException($this->response->setResponse());
    }
}
