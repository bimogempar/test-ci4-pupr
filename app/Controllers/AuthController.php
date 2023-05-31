<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class AuthController extends BaseController
{
    use ResponseTrait;

    public function loginUser()
    {
        $userModel = new User();
        $user = $userModel->where('email', $this->request->getVar('email'))->first();
        if (is_null($user)) {
            return $this->respond(['error' => "User not found.", 401]);
        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $user['email'],
        );

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'message' => 'Login Succesful',
            'token' => $token
        ];

        return $this->respond($response, 200);
    }
}
