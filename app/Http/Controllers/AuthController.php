<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }
    
     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {       
        $data = $request->all();

        $validacao =  Validator::make($data, [        
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        if($validacao->fails()){                      
            return redirect("login")->withSuccess('Falha de validação.');
        }       
          
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'group_id' => 1])) {
            return redirect()->intended('home');
        }           
  
        // TODO: Tratar melhor as mensagens de retorno
        return redirect("login")->withSuccess('Usuário não autorizado.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
