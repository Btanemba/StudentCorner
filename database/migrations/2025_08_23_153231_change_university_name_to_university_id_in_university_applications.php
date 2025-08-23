<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('university_applications', function (Blueprint $table) {
            // Drop the old university_name column
            $table->dropColumn('university_name');

            // Add university_id foreign key
            $table->unsignedBigInteger('university_id')->after('client_id');

            $table->foreign('university_id')
                  ->references('id')
                  ->on('universities')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('university_applications', function (Blueprint $table) {
            // Rollback: drop foreign key + university_id
            $table->dropForeign(['university_id']);
            $table->dropColumn('university_id');

            // Restore the old column
            $table->string('university_name')->after('client_id');
        });
    }
};
