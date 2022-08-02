<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_parents', function (Blueprint $table) {
            $table->id();
            $table->string('created_by')->nullable();
            $table->string('name');
            $table->tinyInteger('status')->default('1')->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });

        $head_parents = array('Student', 'teacher', 'sub-admin', 'staf');
        foreach($head_parents as $user){
            DB::table('head_parents')->insert([
                'created_by' => 'Aslam',
                'name' => $user
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('head_parents');
    }
}
