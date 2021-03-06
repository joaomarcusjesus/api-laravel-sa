<?php
/**
 * Created by PhpStorm.
 * UserOld: pbsoft02
 * Date: 29/03/17
 * Time: 10:33
 */

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;
use SA\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try{
            $token = \JWTAuth::attempt($credentials);
        }catch(JWTException $ex){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        if (!$token){
            return response()->json(['error' => 'credentials_invalids'], 401);
        }

        return response()->json(compact('token'));
    }

    public function logout()
    {
        try{
            \JWTAuth::invalidate();
        }catch(JWTException $ex){
            return response()->json(['error' => 'could_not_invalidate_token', 500]);
        }

        return response()->json([], 204);
    }

    public function refreshToken(Request $request)
    {
       try{
           $bearerToken = \JWTAuth::setRequest($request)->getToken();
           $token = \JWTAuth::refresh($bearerToken);
       }catch(JWTException $exception){
           return response()->json(['error' => 'could_not_refresh_token', 500]);
       }
       return response()->json(compact('token'));
    }
}