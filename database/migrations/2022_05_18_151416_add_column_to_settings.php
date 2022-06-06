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
        if (Schema::hasColumn('settings', 'file_agreement'))
        {
            Schema::table('settings', function (Blueprint $table)
            {
                $table->dropColumn('file_agreement');
            });
        }
        Schema::table('settings', function (Blueprint $table) {
            $table->string('file_agreement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
