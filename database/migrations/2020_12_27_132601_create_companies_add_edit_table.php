<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesAddEditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies_add_edit', function (Blueprint $table) {
            $columns=[
                'url',
                'name',
                'region_id',
                'locality_id',
                'category_id',
                'postalcode',
                'streetaddress',
                'latitude',
                'longitude',
                'telephone',
                //'fax',
                //'email',
                'website',
                'descr'
            ];
            if(Schema::hasColumns('companies_add_edit', $columns))
            {

            }
            else {
                $table->string('url', 250);
                $table->string('name', 250);
                $table->integer('region_id');
                $table->integer('locality_id');
                $table->integer('category_id');
                $table->string('postalcode', 250);
                $table->string('streetaddress', 250);
                $table->decimal('latitude', 10, 7);
                $table->decimal('longitude', 10, 7);
                $table->string('telephone', 250);
                //$table->string('fax', 250);
                //$table->string('email', 250);
                $table->string('website', 250);
                $table->text('descr');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies_add_edit', function (Blueprint $table) {
            //
        });
    }
}
