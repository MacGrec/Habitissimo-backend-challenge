<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req_budget extends Model
{
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'req_budgets';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','category_id','state'];


    /**
     * Get the user that owns the budget request.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
