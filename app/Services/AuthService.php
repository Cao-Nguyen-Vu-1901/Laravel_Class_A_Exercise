<?php

namespace App\Services;

use App\Http\Requests\Api\Auth\LogoutRequest;
use App\Models\InvalidatedToken;
use App\Models\PersonalAccessToken;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService
{
    protected $user;
    protected $personalAccessToken;

    public function __construct(User $user, PersonalAccessToken $personalAccessToken)
    {
        $this->user = $user;
        $this->personalAccessToken = $personalAccessToken;
    }

    public function register($params)
    {
        try {
            return $this->user->create($params);
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }

    public function login($params)
    {
        $user = $this->user->where('email', $params['email'])->first();

        $isPasswordValid = Hash::check($params['password'], $user->password);

        if (!$isPasswordValid) {
            return [
                'status' => false,
                'message' => 'Invalid password and email',
            ];
        }

        $token = $user->createToken('user')->plainTextToken;

        return [
            'status' => true,
            'access_token' => $token,
            'name' => $user->name,
        ];
    }

    public function logout($id)
    {
        $token = PersonalAccessToken::find($id);

        if ($token) {
            $token->expires_at = Carbon::now();
            $token->save();
        } 
    }
}