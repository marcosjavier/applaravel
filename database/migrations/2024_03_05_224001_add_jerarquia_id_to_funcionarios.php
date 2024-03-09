<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJerarquiaIdToFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
					$table->bigInteger('jerarquia_id')->unsigned()->nullable()->after('domicilio');
					$table->foreign('jerarquia_id')
							->references('id')->on('jerarquia')                
							->constrained('jerarquia')
							->cascadeOnUpdate()
							->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
					$table->dropColumn('jerarquia_id');
        });
    }
}
