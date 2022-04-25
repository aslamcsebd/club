<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('head_type');
            $table->string('material', 20);
            $table->string('gift', 20);
            $table->string('parent_head');
            $table->tinyInteger('status')->default('1')->comment('0=Inactive, 1=Active');
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
        Schema::dropIfExists('head_infos');
    }
}
