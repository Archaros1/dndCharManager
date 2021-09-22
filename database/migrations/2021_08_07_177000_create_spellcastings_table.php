<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellcastingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spellcastings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('casting_stat');
            $table->boolean('prepare_spells');
            $table->boolean('know_spells');

            $table->unsignedBigInteger('cantrips_known_count_id')->nullable()->constrained();
            $table->foreign('cantrips_known_count_id')->references('id')->on('evolving_numbers');
            $table->unsignedBigInteger('spells_known_count_id')->nullable()->constrained();
            $table->foreign('spells_known_count_id')->references('id')->on('evolving_numbers');

            $table->foreignId('spell_list_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('slot_list_pack_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spellcastings');
    }
}
