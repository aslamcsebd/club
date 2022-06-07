<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FileAndNoticeEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('files', function (Blueprint $table) {
         $table->string('created_by')->nullable()->after('id');
         $table->dropColumn("recipient_type");
         $table->string('member_type')->nullable()->after('file');
         $table->string('user_type')->nullable()->after('file');
      });

      Schema::table('notices', function (Blueprint $table) {
         $table->dropColumn("user_type");
      });

      Schema::table('notices', function (Blueprint $table) {
         $table->string('created_by')->nullable()->after('id');
         $table->string('member_type')->nullable()->after('description');
         $table->string('user_type')->nullable()->after('description');
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
