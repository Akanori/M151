<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->float('price');
            $table->text('details');
            $table->text('manual');
            $table->string('image');
        });

        DB::table('products')->insert(['name'=>'Mango', 'price'=>2.50, 'details'=>'Lecker Mango.', 'manual'=>'Zuerst Waschen, dann Reinbeissen. aber ACHTUNG!! Mango enthält kernen also vorsichtig geniessen!', 'image'=>'/images/mango.png']);
        DB::table('products')->insert(['name'=>'Mango Curry', 'price'=>5.00, 'details'=>'Curry mit viel Mango.', 'manual'=>'Kochen bei voller Hitze für 10 Minuten und geniessen.', 'image'=>'/images/mangoCurry.jpg']);
        DB::table('products')->insert(['name'=>'Mango Lassi', 'price'=>3.00, 'details'=>'Lassi aus Mango.', 'manual'=>'Kalt Geniessen', 'image'=>'/images/mangoLassi.jpg']);
        DB::table('products')->insert(['name'=>'Mango Pudding', 'price'=>3.20, 'details'=>'Pudding aus Mango.', 'manual'=>'Mit Löffel anstechen und geniessen.', 'image'=>'/images/mangoPudding.jpg']);
        DB::table('products')->insert(['name'=>'Mango Salat', 'price'=>6.90, 'details'=>'Salat mit Mango.', 'manual'=>'Mit einer Gabel eine Mango anstecken und ein Salatblatt und geniessen.', 'image'=>'/images/mangoSalat.jpg']);
        DB::table('products')->insert(['name'=>'Mango Sorbet', 'price'=>3.00, 'details'=>'Sorbet aus Biomango.', 'manual'=>'Mit einer Löffel Abschürfen. Optional noch Rahm dazugeben.', 'image'=>'/images/mangoSorbet.png']);
        DB::table('products')->insert(['name'=>'Mango Torte', 'price'=>12.10, 'details'=>'Torte aus Schweizer Mango handgemacht.', 'manual'=>'Mit einem Messer schneiden und auf einer Serviette Servieren.', 'image'=>'/images/mangoTorte.jpg']);
        DB::table('products')->insert(['name'=>'Monkey', 'price'=>0, 'details'=>'Go back I want to be MONKEY!', 'manual'=>'100 000 000 Mastery Points auf Wukong.', 'image'=>'/images/monkey.jpg']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
