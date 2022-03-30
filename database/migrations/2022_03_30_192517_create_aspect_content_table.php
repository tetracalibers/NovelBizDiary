<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspect_content', function (Blueprint $table) {
            $table->bigInteger('aspect_id');
            $table->bigInteger('person_id');
            $table->text('content');
            $table->timestamps();
            $table->primary(['aspect_id', 'person_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspect_content');
    }
};
