<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MemberEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('members', function (Blueprint $table) {
         $table->renameColumn('user_type', 'member_category');
         $table->renameColumn('form_no', 'member_no');

         $table->string('member_add_from')->after('photo')->comment('By_admin, Online');
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
