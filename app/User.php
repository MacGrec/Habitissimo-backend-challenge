<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'users';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','telephone','address', 'email'];


     /**
     * Get the budget requests of the user.
     */
    public function reqBudget()
    {
        return $this->hasMany('App\Req_budget');
    }

}
