<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnidadIdToDependencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dependencias', function (Blueprint $table) {
            $table->bigInteger('unidad_id')->unsigned()->nullable()->after('descripcion');
            $table->foreign('unidad_id')
                ->references('id')->on('unidades_regionales')                
                ->constrained('unidades_regionales')
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
        Schema::table('dependencias', function (Blueprint $table) {
            $table->dropColumn('unidad_id');
        });
    }
}
