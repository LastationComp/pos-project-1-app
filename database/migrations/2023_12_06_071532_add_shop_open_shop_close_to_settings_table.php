<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::table('settings', function (Blueprint $table) {
            $table->time('shop_open')->nullable()->default(Carbon::createFromTime('07','00','00'))->after('emp_can_delete');
            $table->time('shop_close')->nullable()->default(Carbon::createFromTime('22','00','00'))->after('shop_open');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
