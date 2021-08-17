<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_choices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->boolean('is_action');
            $table->string('activation_time')->nullable();
            $table->string('duration')->nullable();
            $table->string('casting_stat')->nullable();
            $table->boolean('is_custom');
            $table->boolean('is_spellcasting');

            $table->foreignId('feature_id')->constrained();
            $table->foreignId('description_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('spell_list_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('feature_choices');
    }
}
