<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Response;

class ResponseHelper
{
    protected $httpCode = 200;
    public $code;
    public $status = true;
    public $message;
    public $data;

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    public function setHttpCode($httpCode): self
    {
        $this->httpCode = $httpCode;
        return $this;
    }

    public function setResponse()
    {
        return Response::json($this, $this->getHttpCode());
    }
}
