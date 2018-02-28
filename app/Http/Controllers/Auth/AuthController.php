<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
	private $auth;

    public function __construct(JWTAuth $auth)
    {
		$this->auth = $auth;
    }

    /**
     * Logging In
     * 
     * @param  LoginFormRequest $request [description]
     * @return [type]                    [description]
     */
    public function login(LoginFormRequest $request)
    {
    	try {
    		if ( ! $token = $this->auth->attempt($request->only('email', 'password')) ) {
    			return response()->json([
    				'errors' => [
    					'root' => 'Couldnot sign you in with these credentials'
    				]
    			], 401);
    		}
    	} catch (JWTException $e) {
    		return response()->json([
				'errors' => [
					'root' => 'Failed to login.'
				]
			], $e->getStatusCode());
    	}

    	return response()->json([
    		'data' => $request->user(),
    		'meta' => [
    			'token' => $token
    		]
    	], 200);
    }

    /**
     * Registering new user
     * 
     * @param  RegisterFormRequest $request [description]
     * @return [type]                       [description]
     */
    public function register(RegisterFormRequest $request)
    {
    	$user = User::create($request->only('name', 'email', 'password'));
    	$token = $this->auth->validate($request->only('email', 'password'));

    	return $response->json([
    		'data' => $user,
    		'meta' => [
    			'token' => $token
    		]
    	], 200);
    }

    /**
     * Logging user out
     * 
     * @return [type] [description]
     */
    public function logout()
    {
    	$this->auth->invalidate($this->auth->getToken());

    	return response()->json(null, 200);
    }

    /**
     * Grab authenticated user info
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function user(Request $request)
    {
    	return response()->json([
    		'data' => $request->user()
    	], 200);
    }
}
