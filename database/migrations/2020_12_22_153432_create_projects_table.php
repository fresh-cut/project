<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('projects', function (Blueprint $table) {
//            $table->id();
//            $table->string('TITLE');
//            $table->string('DESCRIPTION');
//            $table->string('ADRESS');
//            $table->string('TELEPHONE');
//            $table->string('FAX');
//            $table->string('EMAIL');
//            $table->string('SITE');
//            $table->string('Latitude');
//        });
//        \Illuminate\Support\Facades\DB::unprepared(File::get('/sql.sql'));
        ini_set('memory_limit', '-1');
        \Illuminate\Support\Facades\DB::unprepared(file_get_contents('./sql.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
