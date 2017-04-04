<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservas', function(Blueprint $table) {
            $table->increments('id');
            $table->date('dt_reserva');
            $table->time('hr_inicio');
            $table->time('hr_fim');
            $table->integer('id_numero_imovel');
            $table->integer('id_bloco');
            $table->integer('id_cadastro_reserva_area_comum');
            $table->integer('id_area_pai');

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservas');
	}

}
