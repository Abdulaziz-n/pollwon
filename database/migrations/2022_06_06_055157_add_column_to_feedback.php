<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        if (Schema::hasColumn('feedback', 'status'))
//        {
//            Schema::table('feedback', function (Blueprint $table)
//            {
//                $table->dropColumn('status');
//            });
//        }
        Schema::table('feedback', function (Blueprint $table) {
            $table->string('status')->default('new');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};
