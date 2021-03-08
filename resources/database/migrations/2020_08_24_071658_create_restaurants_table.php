<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdomains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',128)->default('');
            $table->string('last_name',128)->default('');
            $table->string('phone_number',128)->default('');
            $table->string('email',255)->default('');
            $table->string('referral_link',255)->default('');
            $table->string('subdomain',255)->default('');
            $table->enum('status',['1','0'])->default('1');
            $table->enum('deleted',['1','0'])->default('0');
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
        Schema::dropIfExists('restaurants');
    }
}
