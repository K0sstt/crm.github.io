<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name', 40);
            $table->string('site', 40);
            $table->string('linkedin', 100)->nullable();
            $table->string('business_area', 50);
            $table->string('product', 30);
            $table->string('country', 15);
            $table->string('city', 15)->nullable();
            $table->string('address', 40)->nullable();
            $table->string('revenue')->nullable();
            $table->integer('amount_workers')->nullable();
            $table->string('years')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
