<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;


Class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
    $this->request = $request;
    }

    public function getUsers(){
        
        $users = DB::connection('mysql')->select("Select * from tblbooks");

        //return response()->json($users, 200);
        return $this->successResponse($users);
    
    }

    public function index(){

        $users = User::all();
        return $this->successResponse($users);  
    }

    public function addBooks(Request $request ){

        $rules = [
            'bookname' => 'required|max:150',
        ];

        $this->validate($request,$rules);

        $user = User::create($request->all());
        return $this->successResponse($user,Response::HTTP_CREATED);
    }

        /**
        * Obtains and show one user
        * @return Illuminate\Http\Response
        */
    
    public function show($id){

        $user = User::findOrFail($id);
        return $this->successResponse($user);

    }

        /**
        * Update an existing author
        * @return Illuminate\Http\Response
        */

    public function update(Request $request,$id){

        $rules = [
            'bookname' => 'required|max:150',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);
        $user->fill($request->all());

        if ($user->isClean()) {

            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
       
        }

        $user->save();
        return $this->successResponse($user);
       
    }

        /**
        * Remove an existing user
        * @return Illuminate\Http\Response
        */

    public function delete($id){

        $user = User::findOrFail($id);
        $user->delete();
        return $this->successResponse($user);    
    
    }

}


