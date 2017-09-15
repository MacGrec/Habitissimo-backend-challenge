<?php

namespace App\Http\Controllers;

use App\Category;
use App\Req_Budget;
use App\includes\Functions;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    /**
     * Get the best suggestions for a budget request without a category
     *
     * @param  \App\Category  $category
     * @param  identifier of a budget request $id
     * @return \Illuminate\Http\Response
     */
    public function suggest(Category $category, $id)
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
        
        $description = $reqBudget->description;
        $functions = new Functions;
        $categories = $functions->getBestcategories($description); 

        return response()->json([
                                'success' => true,
                                'data' => $categories
                                ], 200);

    }
}
