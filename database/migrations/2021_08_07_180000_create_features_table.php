<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->integer('level');
            $table->boolean('is_spellcasting');
            $table->string('name');
            $table->string('display_name');
            $table->boolean('is_action');
            $table->string('activation_time')->nullable();
            $table->string('duration')->nullable();
            $table->boolean('is_custom');
            $table->boolean('has_choice');
            $table->boolean('modify_stats');

            $table->foreignId('description_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('stat_pack_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('spell_list_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('feature_list_id')->constrained();

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
        Schema::dropIfExists('features');
    }
}
