<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->renameColumn('name', 'teamname');
            $table->unsignedBigInteger('owner_id')->nullable()->after('id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('set null');
            $table->string('coach')->nullable()->after('owner_id');
            $table->dropColumn('hometown');
            $table->integer('goals')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
            $table->renameColumn('teamname', 'name');
            $table->dropColumn('owner_id');
            $table->dropColumn('coach');
            $table->string('hometown')->nullable();
            $table->integer('goals')->nullable(false)->change();
        });
    }
};
