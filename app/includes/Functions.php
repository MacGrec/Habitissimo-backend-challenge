<?php 

namespace App\includes;

use App\Category;
use App\Req_Budget;

class Functions {

 	public static function getBestcategories($desc){ 
 		//get all the category objects	
 		$array_categories = Category::all();
 		$max_percent = 0;
 		$bestCategories = array();
 		$array_categories_match = array();

 		//scroll through the array of categories for calculate the percent of every categorie
 		foreach ($array_categories as $category) {			
 			$category_id = $category->id;
			$array_categories_match[$category_id] = Functions::getMatchPercent($category_id, $desc);
 		}

 		//calculate the best categories using the percent
 		foreach ($array_categories_match as $category_id => $percent) {
 			$category = Category::find($category_id);
 			$name = $category->name;
 			if($percent > $max_percent){
 				$max_percent = $percent;
 				$bestCategories = array($name => intval($category_id));
 			}
 			elseif ($percent === $max_percent) {
 				$bestCategories[$name] = intval($category_id);
 			}
 		}
     	return $bestCategories;
     } 

    public static function getMatchPercent($category_id, $desc){
    	//split the description in a array of words
    	$charlist = 'áéíóúüñ';
    	$array_desc_orphan = str_word_count($desc, 1, $charlist);
    	//number of words of the description
    	$number_words_desc_orphan = sizeof($array_desc_orphan);

    	//get all the budget requests objects with id equal to the parameter $category_id
    	$array_budgetRequest = Req_Budget::where('category_id', $category_id)->get();
    	$max_number_matches = 0;

    	/*scroll through the array of budget trequest for get the max number of matches
    	between the budget request without a category and the others budget request
    	*/ 
    	foreach ($array_budgetRequest as $budgetRequest) {
    		$matches = 0;
    		$description = $budgetRequest->description;
    		foreach ($array_desc_orphan as $word_needle) {
    			if(!is_bool(stripos($description, $word_needle))){
    				//match the word
    				$matches ++;
    			}
    		}
    		if($matches > $max_number_matches)
    			$max_number_matches = $matches;
    	}
    	//calculate the percent of matchs
    	$percent = ($max_number_matches * 100)/$number_words_desc_orphan;
    	return $percent;
     } 

}
?>