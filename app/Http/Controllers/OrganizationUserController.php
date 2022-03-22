<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Organization;
use App\User;

class OrganizationUserController extends Controller
{
    public function store(Request $request, $id)
    {
        $validator = $this->validation($request->all());        
        if($validator->fails())
        return response()->json([
            'fail' => true,
            'errors' => $validator->errors()
        ], 200);
               
        $organization = Organization::find($id);
        $organization->users()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);               
       
        return response()->json([
            'fail' => false,            
            'message' => "Usuário cadastrado com sucesso."
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validation($request->all());        
        if($validator->fails())
        return response()->json([
            'fail' => true,
            'errors' => $validator->errors()
        ], 200);                       
        
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
       
        return response()->json([
            'fail' => false,            
            'message' => "Usuário alterado com sucesso."
        ]);
    }

    private function validation($requestAll)
    {
        return Validator::make($requestAll, [                        
            'name' => 'required|max:50',                          
            'email' => 'required|email',                          
            'password' => 'required',                          
        ]);
    }
}
