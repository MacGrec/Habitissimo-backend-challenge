<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


use Illuminate\Http\Response;
class ReqBudgetTest extends TestCase
{
     use RefreshDatabase;

    /**
     * Test get list of budget requests without email field and
     with email field
     */
    /** @test */
    public function testGetListReqBudget()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('GET', '/reqbudget');

        $response->assertStatus(200)->assertJson(['success' => true]);

    }

    /**
     *  Test get list of budget requests with email field
     */
    /** @test */
    public function testGetListReqBudgetEmail()
    {
        $this->withoutExceptionHandling();

        $method = 'GET';
        $function = 'reqbudget';

        //not exist mail in table req_budgets
        $response = $this->json($method, '/'.$function.'/?email=test@mail.com');

        $response->assertStatus(200)->assertJson(['success' => true]);

        //exist mail in table req_budgets
        $response = $this->json($method, '/'.$function.'/?email=gomu@mail.com');

        $response->assertStatus(200)->assertJson(['success' => true]);

        // bad structure mail
        $response = $this->json($method, '/'.$function.'/?email=testmail.com');

         $response->assertStatus(200)->assertJson(['success' => false]);

         //value null
        $response = $this->json($method, '/'.$function.'/?email=null');

         $response->assertStatus(200)->assertJson(['success' => false]);

         //value -1
        $response = $this->json($method, '/'.$function.'/?email=-1');

         $response->assertStatus(200)->assertJson(['success' => false]);

         //value 0s
        $response = $this->json($method, '/'.$function.'/?email=0');

         $response->assertStatus(200)->assertJson(['success' => false]);
    }

    /**
     * Test to publish a pending budget request
     */
    /** @test */
    public function testPublishReqBudget()
    {
        $this->withoutExceptionHandling();

        $method = 'PUT';
        $function = 'pubbudget';
        //not exist budget request
        $response = $this->json($method, '/'.$function.'/55');

        $response->assertStatus(200)->assertJson(['success' => false]);

        //well done
        $response = $this->json($method, '/'.$function.'/1');

        $response->assertStatus(200)->assertJson(['success' => true]);

        //is already publish
        $response = $this->json($method, '/'.$function.'/1');

        $response->assertStatus(200)->assertJson(['success' => false]);

        //not have title
        $response = $this->json($method, '/'.$function.'/2');

        $response->assertStatus(200)->assertJson(['success' => false]);

        //not have category
        $response = $this->json($method, '/'.$function.'/3');

        $response->assertStatus(200)->assertJson(['success' => false]);

        //not have category and neither title
        $response = $this->json($method, '/'.$function.'/4');

        $response->assertStatus(200)->assertJson(['success' => false]);

    }

    /**
     * Test to mark as discarded a budget request
     */
    /** @test */
    public function testDeleteReqBudget()
    {
        $this->withoutExceptionHandling();

        $method = 'DELETE';
        $function = 'reqbudget';
        //not exist budget request
        $response = $this->json($method, '/'.$function.'/55');

        $response->assertStatus(200)->assertJson(['success' => false]);

        ////well done
        $response = $this->json($method, '/'.$function.'/1');

        $response->assertStatus(200)->assertJson(['success' => true]);

        ////is already discarded
        $response = $this->json($method, '/'.$function.'/1');

        $response->assertStatus(200)->assertJson(['success' => false]);


    }

    /**
     * Test to try to update an inexistent budget request
     */
    /** @test */
    public function testUpdateReqBudget()
    {
        $this->withoutExceptionHandling();

        $method = 'PUT';
        $function = 'reqbudget';
        $table = 'req_budgets';
        //not exist budget request
        $id = 120;
        $response = $this->json($method, '/'.$function.'/'.$id);

        $response->assertStatus(200)->assertJson(['success' => false,
                                        'error_code' =>  101,
                                        'error_message' => 'Budget Request not found'
                                        ]);
    }


     /**
     * Test to try to update the title of a budget request
     */
    /** @test */
    public function testUpdateReqBudgetTitle()
    {
        $this->withoutExceptionHandling();

        $method = 'PUT';
        $function = 'reqbudget';
        $table = 'req_budgets';

        ////well done updating a title
        $new_value = "Actualizado";
        $column = "title";
        $id = 2;
        $data = array($column => $new_value);
        $response = $this->json($method, '/'.$function.'/'.$id, $data);

        $response->assertStatus(200)->assertJson(['success' => true]);

        $this-> assertDatabaseHas($table, ['id' =>$id, $column => $new_value]);

    }

     /**
     * Test to try to update the description of a budget request
     */
    /** @test */
    public function testUpdateReqBudgetDesc()
    {
        $this->withoutExceptionHandling();

        $method = 'PUT';
        $function = 'reqbudget';
        $table = 'req_budgets';

        //well done updating description
        $new_value = "Actualizado";
        $column = "description";
        $id = 2;
        $data = array($column => $new_value);
        $response = $this->json($method, '/'.$function.'/'.$id, $data);

        $response->assertStatus(200)->assertJson(['success' => true]);

        $this-> assertDatabaseHas($table, ['id' =>$id, $column => $new_value]);
    }


    /**
     * Test to try to update the category_id of a budget request
     */
    /** @test */
    public function testUpdateReqBudgetCat()
    {
        $this->withoutExceptionHandling();

        $method = 'PUT';
        $function = 'reqbudget';
        $table = 'req_budgets';

        //well done updating category
        $new_value = 3;
        $column = "category_id";
        $id = 2;
        $data = array($column => $new_value);
        $response = $this->json($method, '/'.$function.'/'.$id, $data);


        $response->assertStatus(200)->assertJson(['success' => true]);

        $this-> assertDatabaseHas($table, ['id' =>$id, $column => $new_value]);
    }

     /**
      * Test to try to update the desciption of a budget request with state not pending
     */
    /** @test */
    public function testUpdateReqBudgetNotPend()
    {
        $this->withoutExceptionHandling();

        $method = 'PUT';
        $function = 'reqbudget';
        $table = 'req_budgets';


        //Try to update not pending budget request 
        $method = 'PUT';
        $function = 'pubbudget';
        $id = 1;
        $response = $this->json($method, '/'.$function.'/'.$id);
        $response->assertStatus(200)->assertJson(['success' => true]);

        $new_value = "Actualizado";
        $column = "description";
        $data = array($column => $new_value);
        $response = $this->json($method, '/'.$function.'/'.$id, $data);

        $response->assertStatus(200)->assertJson([
                                        "success" => false,
                                        "error_code" => 103
                                        ]);
    }

    
     /**
     * Test to create a budget request with a new user
     */
    /** @test */
    public function testCreateReqBudgetNewUser()
    {
        $this->withoutExceptionHandling();

        $method = 'POST';
        $function = 'reqbudget';
        //not enough parameters
        $response = $this->json($method, '/'.$function);

        $response->assertStatus(200)->assertJson([
                                        'success' => false,
                                        "error_code" => 102
                                        ]);

        //well done creating budget request with a new user
        $id = 2;
        $email = "new_user@mail.com";
        $telephone = "6666666666";
        $address = "Calle 42";
        $description = "This is a test";
        $data = array(
            "description" => $description,
            "email" => $email,
            "telephone" => $telephone ,
            "address" => $address,
            );
     
        $response = $this->json($method, '/'.$function.'/', $data);

        $response->assertStatus(200)->assertJson(['success' => true]);

        $table = 'users';
        $this-> assertDatabaseHas($table, [
                        'email' => $email,
                        'telephone' => $telephone,
                        'address' => $address
                        ]);

        $table = 'req_budgets';
        $this-> assertDatabaseHas($table, [
                        'description' => $description
                        ]);
    }

    /**
     * Test to create a budget request with registered user
     */
    /** @test */
    public function testCreateReqBudget()
    {
        $this->withoutExceptionHandling();

        $method = 'POST';
        $function = 'reqbudget';
        //not enough parameters
        $response = $this->json($method, '/'.$function);

        $response->assertStatus(200)->assertJson([
                                        'success' => false,
                                        "error_code" => 102
                                        ]);

        //well done creating budget request with a registered user
        $id = 2;
        $email = "gomu@mail.com";
        $telephone = "6666666666";
        $address = "Calle 42";
        $description = "This is a test";
        $data = array(
            "description" => $description,
            "email" => $email,
            "telephone" => $telephone ,
            "address" => $address,
            );
     
        $response = $this->json($method, '/'.$function.'/', $data);

        $response->assertStatus(200)->assertJson(['success' => true]);

        $table = 'users';
        $this-> assertDatabaseHas($table, [
                        'email' => $email,
                        'telephone' => $telephone,
                        'address' => $address
                        ]);

        $table = 'req_budgets';
        $this-> assertDatabaseHas($table, [
                        'description' => $description
                        ]);
    }
}
