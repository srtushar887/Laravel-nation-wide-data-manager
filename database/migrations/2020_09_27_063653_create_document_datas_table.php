<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_datas', function (Blueprint $table) {
            $table->id();
            $table->string('practice')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('dos')->nullable();
            $table->string('document_name')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->text('document_url')->nullable();
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
        Schema::dropIfExists('document_datas');
    }
}
