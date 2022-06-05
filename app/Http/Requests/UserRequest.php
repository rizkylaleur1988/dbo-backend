<?php

namespace App\Http\Requests;

use App\Helpers\ResponseHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(8)],
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
