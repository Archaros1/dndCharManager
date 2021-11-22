<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_datas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('gear_data_id')->nullable()->constrained()/* ->onUpdate('cascade')->onDelete('set null') */;
            $table->foreignId('feature_list_id')->nullable()->constrained()/* ->onUpdate('cascade')->onDelete('set null') */;
            $table->foreignId('description_id')->nullable()->constrained()/* ->onUpdate('cascade')->onDelete('set null') */;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_datas');
    }
}
