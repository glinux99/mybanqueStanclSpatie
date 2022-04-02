<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->string('matricule',20)->unique();
            $table->string('adresse_mail',30)->unique();
            $table->string('psswd');
            $table->bigInteger('numero_tel')->default(0000000000)->nullable();
            $table->string('type_compte',60)->default('no-entry')->nullable();
            $table->char('genre',2)->default('F')->nullable();
            $table->string('photo')->default('assets/img/default_user.png')->nullable();
            $table->string('quart_av',60)->default('Virunga')->nullable();
            $table->string('province',15)->default('Nord-Kivu')->nullable();
            $table->string('ville',15)->default('Goma')->nullable();
            $table->string('pays',15)->default('RDC')->nullable();
            $table->text('apropos')->default('')->nullable();
            $table->double('solde')->default(0)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
