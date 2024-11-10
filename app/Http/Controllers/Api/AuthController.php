<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $registerRequest)
    {
        $params = $registerRequest->validated();
        $result = $this->authService->register($params);

        if ($result) {
            return response()->api_success('Register success', new UserResource($result));
        }

        return response()->api_error('Register error');
    }

    public function login(LoginRequest $loginRequest)
    {
        $params = $loginRequest->validated();

        $result = $this->authService->login($params);

        if ($result['status']) {
            return response()->api_success('Login success', $result);
        }

        return response()->api_error('Login error', $result['message']);
    }
    
    public function logout(Request $request)
    {
        $authorizationHeader = $request->header('Authorization');
        
        if ($authorizationHeader) {
            $token = str_replace('Bearer ', '', $authorizationHeader);
    
            $tokenParts = explode('|', $token);
     
            if (isset($tokenParts[0])) {
                $tokenId = $tokenParts[0];
                $this->authService->logout($tokenId);
            }
        }
    }
    
    public function checkToken()
    { 
        if (Auth::guard('sanctum')->check()) { 
            $user = Auth::guard('sanctum')->user();
            return response()->api_success('Login success', $user);
        }
 
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
