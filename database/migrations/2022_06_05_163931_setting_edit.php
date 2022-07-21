<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SettingEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('custom_fields', function (Blueprint $table) {
         $table->string('created_by')->nullable()->after('id');
        });

        Schema::table('user_types', function (Blueprint $table) {
         $table->string('created_by')->nullable()->after('id');
        });

        Schema::table('head_parents', function (Blueprint $table) {
         $table->string('created_by')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
