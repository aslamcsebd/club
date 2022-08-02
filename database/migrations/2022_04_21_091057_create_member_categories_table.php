<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_categories', function (Blueprint $table) {
            $table->id();
            $table->string('created_by')->nullable();
            $table->string('name');
            $table->string('paymentType');
            $table->string('reg_fee');
            $table->string('percentage')->nullable();
            $table->string('monthly')->nullable();            
            $table->tinyInteger('status')->default('1')->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });

        $member_category = array('Student', 'Teacher', 'Driver', 'Staf');
        foreach($member_category as $member){
            DB::table('member_categories')->insert([
                'created_by' => 'Aslam',
                'name' => $member,            
                'paymentType' => 'One Time',
                'reg_fee' => 1000,
                'percentage' => 10,
                'monthly' => ''
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
        Schema::dropIfExists('member_categories');
    }
}
