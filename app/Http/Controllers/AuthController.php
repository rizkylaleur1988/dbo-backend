<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setData($users);
        return $this->response->setResponse();
    }

    public function store(UserRequest $request)
    {
        try {
            $user = User::create($request->only('name', 'email', 'password'));
            $this->response->setHttpCode(Response::HTTP_OK);
            $this->response->setCode($this->response->getHttpCode());
            $this->response->setMessage('User has been created');
            $this->response->setData($user);
        } catch (\Throwable $th) {
            $this->response->setHttpCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            $this->response->setCode($th->getCode());
            $this->response->setMessage($th->getMessage());
        }
        return $this->response->setResponse();
    }

    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            $this->response->setHttpCode(Response::HTTP_UNAUTHORIZED);
            $this->response->setCode($this->response->getHttpCode());
            $this->response->setStatus(false);
            $this->response->setMessage('Unauthorized');
            return $this->response->setResponse();
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setData(auth()->user());
        return $this->response->setResponse();
    }

    public function logout()
    {
        auth()->logout();
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setMessage('Successfully logged out');
        return $this->response->setResponse();
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ];
        $this->response->setHttpCode(Response::HTTP_OK);
        $this->response->setCode($this->response->getHttpCode());
        $this->response->setData($data);
        return $this->response->setResponse();
    }

}
