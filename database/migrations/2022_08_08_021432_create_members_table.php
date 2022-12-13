<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('address', 64);
            $table->string('prov_address', 64)->nullable();
            $table->string('contact_number', 20);
            $table->string('email', 64);
            $table->string('facebook', 64);
            $table->date('birthdate');
            $table->string('birthplace', 128);
            $table->string('religion', 32);
            $table->string('sss', 64);
            $table->string('tin', 64);
            $table->string('education', 64);
            $table->text('skills');
            $table->string('employment');
            $table->integer('income');
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
        Schema::dropIfExists('members');
    }
}
