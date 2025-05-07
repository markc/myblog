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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('remember_token');
            $table->boolean('can_post')->default(false)->after('is_admin');
            $table->boolean('can_edit_others')->default(false)->after('can_post');
            $table->boolean('can_moderate')->default(false)->after('can_edit_others');
            // profile_photo_path is already added by the blog migration
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'is_admin',
                'can_post',
                'can_edit_others',
                'can_moderate',
            ]);
        });
    }
};
