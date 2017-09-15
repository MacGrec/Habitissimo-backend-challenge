<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReqBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('req_budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description');
            $table->integer('category_id')->unsigned()->nullable();
            $table->enum('state', ['pending', 'published', 'discarded']);
            $table->integer('user_id')->unsigned();;
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
        });

 


        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Presupuesto de colocación de 1 termo a gas-butano de 11 litros junker.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        

        //Begin Data for test
        // Insert a budget request for test with no title
        //id 2
        DB::table('req_budgets')->insert(
            array(
                'title' => null,
                'description' => 'Test',
                'category_id' => 6,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        // Insert a budget request for test with no category
        // id 3
        DB::table('req_budgets')->insert(
            array(
                'title' => "Test",
                'description' => 'Test',
                'category_id' => null,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        // Insert a budget request for test with no category and no title
        //id 4
        DB::table('req_budgets')->insert(
            array(
                'title' => null,
                'description' => 'Test',
                'category_id' => null,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        //Insert a budget for test of suggest category
        //id 5
        DB::table('req_budgets')->insert(
            array(
                'title' => null,
                'description' => 'quiero quitar la bañera y poner una mampara con un plato de ducha',
                'category_id' => null,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        //End Data for test


        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Instalacion de caldera tres cuartos, hol pasillo y comedor de calefacion.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Calefaccion en casa, necesitaria radiadores y calefactor ya que todo lo tengo a luz.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Instalar termo de gas natural de 14L, sustituyendo el averiado. Con certificación.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Buenos dias. Me gustaria instalar calefacción electrica en casa. Estoy interesada en poner radiadores electricos o suelo radiante. Entiendo que la segunda opción es mas cara y más complicada de instalar. Dispongo de suelo de tarima. La casa tiene aprox 53 m cuadrados. En caso de radiadores electricos, serían instalar dos en el salon comedor, uno en la habitación grande, uno pequeño en la habitación pequeña y un radiador toallero en el baño.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Instalación de caldera (en cocina) para producción de acs y que le de servicio también a una instalación de radiadores para salón y tres dormitorios. (instalación completa) Salón 22. 40 Dormitorios 7. 05, , 10. 70 y 5. 85 Altura 2. 45.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Comprar e instalalion de estufa de pallets para vivienda pareticular.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Sustituir caldera existente por una caldera bazo nox. Contactar via mail. Gracias.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Cambio de caldera de gas natural para calefacción y agua caliente.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Calefaccion gas natural suelo radiante y ACS para un edificio unifamiliar de 4 alturas y sobre 100 metros por planta. La intención es instalar una sola caldera para todo el efificio pero estamos abiertos a escuchar otras opciones.',
                'category_id' => 1,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );


        // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Reformar cocina, cambiando azulejos, suelo, puntos de electricidad y fontanería y techo. Retirada de  muebles antiguos  aproximadamente a partir del mes de junio.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Cocina para restaurante especializado en hamburguesas. Necesitaremos plancha, parrilla eléctrica, horno, freidoras, mesas de trabajo, mise en place, tostadoras, batidoras. Cámara frigorífica positivo y negativo.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Instalar campana decorativa de 70 modelo tema dh2 70 inox, desmontando una similar que se encuentra actualmente instalada.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Necesitaria marmolistas que toquen silestone para una cocina.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Cambiar la encimera e cocina por una de piedra y simi, metros lineales: cinco en esquina.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Necesito una cocina, solo muebles d abajo, la pared mide 3 metros.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Cocina  rinconera de 2. 20x1. 70, estilo rustico.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Renovar cocina. 3m x 2m aprox. Tirar una pared.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Necesito presupuesto para el cambio de una encimera en una cocina sin estrenar de material de formica a silestone o similar. Facilitaré las medidas a aquellos que se pongan en contacto conmigo. Gracias.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Encimera aglomerado de color negro. Medidas 1, 80 x 0, 61 de fondo.',
                'category_id' => 2,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );


         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Una mampara de ducha de una puerta abatible de 70 no me importaria que fuera barata de expocicion.',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Cambiar banera 150 x 70 por otra de igual tamaño ya comprada y en casa.',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Necesito arreglar el baño de casa, tengo que cambiar el plato de ducha (que es muy pequeño) y poner uno nuevo un poco más grande con mamparas. Lo más económico posible.',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Presupuesto para reformar un baño, en el que hay que quitar la bañera y poner un plato de ducha',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Necesito que me esmalten una bañera de hierro con patas, que la saneen y la pinten. En definitiva, que la restauren.',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Cambiar columna de hidromasaje por ducha.',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Reforma de baño alicatado y fontaneria.
Hay que quitarle el azulejo y los más importante es cambiar toda la fontanería ya que la distribución cambia; en un hueco nuevo hay que montar una ducha, y quitar de sitio los sanitarios ',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Reformar del baño, alicatado, cambiar bañera, cambiar lavabo, quitar racholas, .',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Cambiar  bañera por un pie de ducha  de lado a lado o sea grande, y colocar una  mampara de acrilico, y colocar alguna baldosa blanca hasta cubrir el espacio descubierto que deja la bañera.',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Cambiar baño completo. Azulejo, suelo, sanitarios, bañera por ducha. . . Tiene aproximadamente 4. 7 metros cuadrados de superficie (276x186) y 2. 25 de alto No me importa dejar el trabajo para el verano salvo que haya fuga. De omento se me han levantado las baldosas del suelo y no parece que haya agua.',
                'category_id' => 3,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );


         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Presupuesto de mantenimiento i reparación de aire acondicionado de la marca  mitsubishi electric.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Sustituir una bomba de calor roof top ventilador axial averiado de potencias frio/calor del orden de 10 kCal/h y kF/h, caudal : 2. 400 m3/h.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Instalacion aire acondicionado/bomba de calor para un salon de actos de unos 100 m2. Calidad alta/media.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Instsalar aire acondicionat en un menjador de 35 m2.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Instalar aire condicionado en el salon y en el dormitorio Salon mide 28, 50 m* Dormitorio mide 16 m*.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Tengo un equipo de aire acondicionado/calefaccion que tiene una perdida de gas. Necesito que detecten la fuga y recargar de nuevo de gas.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Aire acondicionado mitsubishi electric en valencia, 
El suministro y instalacion del equipo. Solo en el salon la innstalacion. Precio economico. En naquera, valencia.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Hola, tengo una casa de unos 50 m2 con sobrepiso abierto, q me aconsejáis? por lo q he leido la bomba de calor podria encajarme. . . Espero vuestro consejo e información, gracias!!',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Aire acondicionado por conductos, para 4 dormitorios.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Instalación de aire acondicionado es un compresor y tres splits, dos son para dos habitaciones y el otro para el salón, pero están en plantas diferentes, las habitaciones están contiguas y el salón está en la planta inferior.',
                'category_id' => 4,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );

         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Necesito presupuesto para construir una casa de dos plantas en churriana de la vega (Granada). Tengo la parcela de 220 metros cuadrados en propiedad. Se trataría de una casa de 3 plantas con 5 o más habitaciones. Estoy pendiente de adquirir el proyecto.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Construir una casa desde cero. Tengo localizado un terreno en arroyo de la miel en una zona urbanizada y  tiene los servicios básicos. El terreno está nivelado y tiene unos 450m2 La casa tendría 4 habitaciones 3  baños lubina  cocina y comedor. Aproximadamente 150 m2.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Presupuesto para cubrir terraza de 6mts de ancho por 3´70mts de largo, con inclinación de unos 30º, los materiales necesarios se detallan a continuación, agradeceria se detalle el presupuesto. 6 bigas de 3. 70x16x8.
                1 biga de 6. 00x16x16. 22m2 de termochip con acabado machimbrado de pino. 22m2 de honduline. 
                22m2 de teja md. Arabe. 2 ventanas mavlux practicables con acabado de pino 118x65 c/u. 
                Frontal de aluminio con tres ventanas abatibles acabado blanco 50x110 c/u aproximadamente. 
                Materiales y mano de obra. Total.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Quisiera saber precio de construir una casa para ir a hablar con mi banco y llevar una cantidad aproximada.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Chalet de 4 habitaciones con baño amplio salon amplio porche de 160 m2 +porche de 30m2+ piscina+ garage 2 plazas + perimetro.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Necesito de profesionales en la construcción de 6 unifamiliares en madrid de 709 m2 construidos. Estructura metálica, cerramiento en tosco o termo arcilla, mono capa. Interior en pladur, tarima flotante en las dos plantas y gres en cocina, baños y aseo.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Demoler una casa vieja de 100 m2 y construir una nueva en planta de 150m2 de 4 o 5 habitaciones con garaje debajo de la casa y una habitación al lado del garaje. Sólo he visto la casa, y quiera saber si es viable este proyecto.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => '200 metros lineales de vigas de hierro HEB 250 y 200 metros lineales de IPN 250.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Hola javi, soy eddy, he perdido el  móvil y toda la agenda, me podrías llamar para tener tu número? muchas gracias.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')

            )
        );
         // Insert a budget request
        DB::table('req_budgets')->insert(
            array(
                'title' => "Training data",
                'description' => 'Presupuesto ampliar casa Terreno desnivelado Sant vicents dels horts. Barcelona Reformar planta y anadir un piso.',
                'category_id' => 5,
                'state' => 'pending',
                'user_id' => 1,
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
        Schema::dropIfExists('req_budgets');
    }
}
