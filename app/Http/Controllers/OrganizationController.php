<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Organization;
use App\User;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['url'=>'','titulo'=>'Organizações'],                                   
        ];
         
        $searchText=trim($request->get('searchText'));
        
        $organizations = Organization::where('name', 'LIKE', '%' . $searchText . '%')
            ->where('id', '>', 1)
            ->orderBy("name","ASC")
            ->withTrashed()
            ->paginate(10);  
       
        return view('organizations.index', compact('organizations', 'searchText'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $breadcrumbs = [                     
            ['url'=>route('organizations.index'),'titulo'=>'Organizações'],
            ['url'=>'','titulo'=>'Adicionar']
        ];
      
        return view('organizations.create', compact('breadcrumbs'));
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
               
        $organization = Organization::create([                                 
            'name' => $request['name']            
        ]);
       
        return response()->json([
            'fail' => false,            
            'message' => "Organização cadastrada com sucesso."
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
        $breadcrumbs = [
            ['url'=>'','titulo'=>'Organizações'], 
            ['url'=>'','titulo'=>'Detalhes'],            
        ];

        $organization = Organization::withTrashed()->find($id); 
        $users = $organization->users;      
         
        return view('organizations.show', compact('organization', 'users', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organization = Organization::find($id);
        $result = $organization->delete();

        if ($result) {
            return response()->json([
                'fail' => false,            
                'message' => "Organização excluída com sucesso."
            ]);
        }
        else {
            return response()->json([
                'fail' => true,            
                'message' => "Falha ao excluir orgamização."
            ]); 
        }
    }

    public function reactivate($id)
    {
        $organization = Organization::onlyTrashed()->find($id);
        $result = $organization->restore();

        if ($result) {
            return response()->json([
                'fail' => false,            
                'message' => "Organização reativada com sucesso."
            ]);
        }
        else {
            return response()->json([
                'fail' => true,            
                'message' => "Falha ao reativar orgamização."
            ]); 
        }
    }

    private function validation($requestAll)
    {
        return Validator::make($requestAll, [                        
            'name' => 'required|max:50',                          
        ]);
    }
}
