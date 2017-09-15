<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // Insert a category
        DB::table('categories')->insert(
            array(
                'id' => 1,
                'name' => "heating",
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        // Insert a category
        DB::table('categories')->insert(
            array(
                'id' => 2,
                'name' => "Kitchen Renovations",
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        // Insert a category
        DB::table('categories')->insert(
            array(
                'id' => 3,
                'name' => "Reforms Bathrooms",
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        // Insert a category
        DB::table('categories')->insert(
            array(
                'id' => 4,
                'name' => "Air conditioner",
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

         // Insert a category
        DB::table('categories')->insert(
            array(
                'id' => 5,
                'name' => "Construction Houses",
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        // Category for test
        // Insert a category
        DB::table('categories')->insert(
            array(
                'id' => 6,
                'name' => "Test",
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
