<?php

namespace App\Http\Controllers;

use App\Req_Budget;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class ReqBudgetController extends Controller
{
    /**
     * Get a list of budget request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vars_request = $request->all();
        $rules = array(
                    'email' => 'email|max:191'
                    );
        $validator = Validator::make($vars_request, $rules);

        if ($validator->fails()) {
            return response()->json([
                                    'success' => false,
                                    'error_code' => 102,
                                    'error_message' => $validator->messages()
                                ], 200);
        }
        $array_reqBudget = Req_Budget::all();
        $req_email = isset($vars_request['email'])?$vars_request['email']:null;
        $array_temp_reqBudget = array();
        if(isset($req_email) && !empty($req_email)){
             foreach ($array_reqBudget as $reqBudget) {
                 $user = $reqBudget->user()->get()->first();
                 $user_email = $user->email;
                 if(isset($user_email) && strcmp($user_email, $req_email) == 0){
                    $array_temp_reqBudget[] = $reqBudget;;
                 }
             }

             $array_reqBudget = $array_temp_reqBudget;
        }
        
        return response()->json([
                                'success' => true,
                                'data' => $array_reqBudget
                            ], 200);
    }

    /**
     * Create a budget request or update one
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  identifier of a budget request $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        $vars_request = $request->all();
        $rules = array();
        $user_id = null;

        //Update existing and pending budget request
        if ($request->isMethod('put') && (isset($id) && !empty($id))){

            $rules = array(                                
                            'title' => 'nullable|alpha_dash|max:191', 
                            'description' => 'nullable|max:65535',
                            'category_id' => 'nullable|numeric|exists:categories,id',
                            );
            
            $validator = Validator::make($vars_request, $rules);

            if ($validator->fails()) {
                return response()->json([
                                        'success' => false,
                                        'error_code' => 102,
                                        'error_message' => $validator->messages()
                                    ], 200);
            }

            //Get the Budget Request
            $reqBudget = Req_Budget::find($id);
            if (!$reqBudget) {

                return response()->json([
                                        'success' => false,
                                        'error_code' =>  101,
                                        'error_message' => 'Budget Request not found'
                                    ], 200);
            }
            //check if the state is pending
            $state = $reqBudget->state;
            if(strcmp($state, "pending") !== 0){
                return response()->json([
                                        'success' => false,
                                        'error_code' =>  103,
                                        'error_message' => 'The state is not pending'
                                    ], 200);
            }

        } else {
            //create a new budget request
                    $rules = array(
                                'description' => 'required|max:65535',
                                'email' => 'required|email|max:191',
                                'telephone' => 'required|max:191',
                                'address' => 'required|max:191',
                                'title' => 'nullable|alpha_dash|max:191',
                                'category_id' => 'nullable|numeric|exists:categories,id',
                                'name' => 'nullable|max:191'
                                );
            
                    $validator = Validator::make($vars_request, $rules);

                    if ($validator->fails()) {
                        return response()->json([
                                                'success' => false,
                                                'error_code' => 102,
                                                'error_message' => $validator->messages()
                                            ], 200);
                    }

                    $reqBudget = new Req_Budget;

                     //check if the user exist get the id
                    $user = User::where('email', $vars_request['email'])->first();

                    //if not exist create the new user
                    if(!isset($user)){
                        $user = new User;
                        $user ->email = $vars_request['email'];
                        
                    }

                    $user->name = isset($vars_request['name'])?$vars_request['name']:null;
                    $user ->telephone = $vars_request['telephone'];
                    $user ->address = $vars_request['address'];

                    //Check if everything was ok creating/updating the user
                    if(($user->save()) === false){
                        return response()->json([
                                                'success' => false,
                                                'error_code' => 104,
                                                'error_message' => "Problem updating/creating user"
                                            ], 200);
                    }

                    $user_id = $user->id;
        }


       
        //update the values
        $reqBudget->title = isset($vars_request['title'])?$vars_request['title']:$reqBudget->title;
        $reqBudget->description =  isset($vars_request['description'])?$vars_request['description']:$reqBudget->description;
        $reqBudget->category_id =  isset($vars_request['category_id'])?$vars_request['category_id']:$reqBudget->category_id;

        //change the state
        $reqBudget->state = "pending";
        $reqBudget->user_id = isset($user_id)?$user_id:$reqBudget->user_id; 

 
        if(($reqBudget->save()) === true) {
             return response()->json([
                                    'success' => true,
                                    'data' => array("id"=>$reqBudget->id)
                                ], 200);
        } else {
             return response()->json([
                                    'success' => false,
                                    'error_code' => 105,
                                    'error_message' => "Problem updating/creating the budget requests"
                                ], 200);
        }
 
    }


     /**
     * Mark as published a budget request
     *
     * @param  \Illuminate\Http\Request  $request 
     * @param  \App\Req_Budget  $req_Budget
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request, $id)
    {
        //Get the Budget Request
        $reqBudget = Req_Budget::find($id);

        if (!$reqBudget) {
            return response()->json([
                                    'success' => false,
                                    'error_code' =>  101,
                                    'error_message' => 'Budget Request not found'
                                ], 200);
        }

        //check if the state is pending
        $state = $reqBudget->state;
        if(strcmp($state, "pending") !== 0){
            return response()->json([
                                    'success' => false,
                                    'error_code' =>  103,
                                    'error_message' => 'The state is not correct'
                                ], 200);
        }

        $title =  $reqBudget->title;
        $category_id =  $reqBudget->category_id;

        //check if the Budget Request is complete
        if(isset($title) && isset($category_id)){
            //change the state
            $reqBudget->state = "published";

            if(($reqBudget->save()) === false){
                return response()->json([
                                        'success' => false,
                                        'error_code' =>  107,
                                        'error_message' => 'Saving data process has been wrong'
                                    ], 200);
            }
            return response()->json([
                                    'success' => true,
                                    'data' => array("id"=>$reqBudget->id)
                                    ], 200);
            

        }
        else{
                return response()->json([
                                        'success' => false,
                                        'error_code' =>  106,
                                        'error_message' => 'The budget request is not complete'
                                    ], 200);
        }

    }

    /**
     * Mark as discarded a budget request
     *
     * @param  \App\Req_Budget  $req_Budget
     * @param  identifier of a budget request $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Req_Budget $req_Budget, $id)
    {
        //Get the Budget Request
        $reqBudget = Req_Budget::find($id);

        if (!$reqBudget) {
            return response()->json([
                                    'success' => false,
                                    'error_code' =>  101,
                                    'error_message' => 'Budget Request not found'
                                ], 200);
        }

        //check if the state is pending
        $state = $reqBudget->state;
        if(strcmp($state, "discarded") == 0){
            return response()->json([
                                    'success' => false,
                                    'error_code' =>  103,
                                    'error_message' => 'The state is not correct'
                                ], 200);
        }

        //change the state
        $reqBudget->state = "discarded";
        if(($reqBudget->save()) === false){
                return response()->json([
                                        'success' => false,
                                        'error_code' =>  107,
                                        'error_message' => 'Saving data process has been wrong'
                                    ], 200);
        }

        return response()->json([
                        'success' => true,
                        'data' => array("id"=>$reqBudget->id)
                    ], 200);
        
        
    }
}
