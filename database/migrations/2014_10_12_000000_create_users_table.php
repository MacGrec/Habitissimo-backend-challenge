<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();;
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('address');
            $table->timestamps();
        });

        // Insert a user
        DB::table('users')->insert(
            array(
                'name' => "Monkey D. Luffy",
                'email' => 'gomu@mail.com',
                'telephone' => 654232162,
                'address' => 'calle central, casa roja, Villa del Molino de Viento',
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        // Insert a user
        DB::table('users')->insert(
            array(
                'name' => "Neo, The choosen one",
                'email' => 'matrix@mail.com',
                'telephone' => 663423232,
                'address' => 'Incubadora 54322, campo de cultivo 500, ciudad de las maquinas',
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
        Schema::dropIfExists('users');
    }
}
