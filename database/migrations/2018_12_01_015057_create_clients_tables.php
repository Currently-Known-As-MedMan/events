<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('type');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('client_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->integer('client_id')->unsigned()->nullable()->after('verified');
            $table->json('client_list')->nullable()->after('client_id');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropForeign('users_client_id_foreign');
            $table->dropColumn('client_id');
            $table->dropColumn('client_list');
        });

        Schema::dropIfExists('client_type');
        Schema::dropIfExists('clients');
    }
}
