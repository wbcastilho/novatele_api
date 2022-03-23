<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class RootUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['url'=>'','titulo'=>'Usuários'],                                   
        ];
         
        $searchText = trim($request->get('searchText'));
        
        $users = User::where('name', 'LIKE', '%' . $searchText . '%')            
            ->where('group_id', '=', 1)
            ->orderBy("name","ASC")            
            ->paginate(10);  
       
        return view('root_user.index', compact('users', 'searchText'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $breadcrumbs = [                     
        ['url'=>route('root.index'),'titulo'=>'Usuários'],
        ['url'=>'','titulo'=>'Adicionar']
    ];
  
    return view('root_user.create', compact('breadcrumbs'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validation($request->all());        
        if($validator->fails())
        return response()->json([
            'fail' => true,
            'errors' => $validator->errors()
        ], 200);                      

        $user = User::create([    
            'name' => $request['name'],
            'email' => $request['email'],
            'group_id' => 1,
            'password' => Hash::make($request['password'])
        ]); 
       
        return response()->json([
            'fail' => false,            
            'message' => "Usuário cadastrado com sucesso."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumbs = [          
            ['url'=>'','titulo'=>'Usuários'],           
            ['url'=>'','titulo'=>'Alterar']
        ];
        
        $user = User::find($id);                   
    
        return view('root_user.edit', compact('user', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $result = $user->delete();

        if ($result) {
            return response()->json([
                'fail' => false,            
                'message' => "Usuário excluido com sucesso."
            ]);
        }
        else {
            return response()->json([
                'fail' => true,            
                'message' => "Falha ao excluir usuário."
            ]); 
        }
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
