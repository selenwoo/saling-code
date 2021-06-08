<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('company_intro');
            $table->text('company_intro_en');
            $table->string('company_add',250)->nullable;
            $table->string('company_add_en',250)->nullable;
            $table->string('company_tel',50)->nullable;
            $table->string('company_phone',50)->nullable;
            $table->string('company_fax',50)->nullable;
            $table->string('company_email',250)->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
