<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


use Illuminate\Http\Response;
class CategoryTest extends TestCase
{
     use RefreshDatabase;

    /**
     * Test get suggestions for a budget request without a category
     */
    /** @test */
    public function testGetSuggest()
    {
        //show the raw information of the exception
        $this->withoutExceptionHandling();

        //well done suggestion for a budget request without a category
        $id = 5;
        $response = $this->json('GET', '/suggcategory/'.$id);

         $response->assertStatus(200)->assertJson([
                                        'success' => true,
                                        "data"=>array(
                                                "Reforms Bathrooms" => 3
                                            )
                                        ]);

    }
}
