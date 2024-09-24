<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sports', function (Blueprint $table) {
            $table->timestamp('read_at')->nullable()->after('message');  // Add read_at column
        });
    }

    public function down()
    {
        Schema::table('sports', function (Blueprint $table) {
            $table->dropColumn('read_at');  // Remove read_at column
        });
    }
};
