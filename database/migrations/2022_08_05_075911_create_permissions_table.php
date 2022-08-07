<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id()->index();
            $table->bigInteger('parent_id')->nullable()->index();
            $table->string('slug'); //edit-posts
            $table->string('name'); // edit posts
            $table->string('description')->nullable();
            $table->text('url')->nullable();
            $table->bigInteger('priority')->default(10000000)->index();
            $table->tinyInteger('show')->default(1)->index();
            $table->timestamps();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->index();
            $table->unsignedBigInteger('permission_id')->index();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions');

            $table->timestamps();
        });

        DB::table('permissions')->insert(['id' => 10000000, 'slug' => 'access-platform-users', 'name' => 'Users', 'url' => '/admin/users']);
        DB::table('permissions')->insert(['id' => 10000001, 'parent_id' => 10000000, 'slug' => 'create-platform-user', 'name' => 'Create User']);
        DB::table('permissions')->insert(['id' => 10000002, 'parent_id' => 10000000, 'slug' => 'read-platform-user', 'name' => 'Read User']);
        DB::table('permissions')->insert(['id' => 10000003, 'parent_id' => 10000000, 'slug' => 'update-platform-user', 'name' => 'Update User']);

        DB::table('permissions')->insert(['id' => 10000005, 'slug' => 'access-platform-bills', 'name' => 'Bills', 'url' => '/admin/bills']);
        DB::table('permissions')->insert(['id' => 10000006, 'parent_id' => 10000005, 'slug' => 'create-platform-bill', 'name' => 'Create bill']);
        DB::table('permissions')->insert(['id' => 10000007, 'parent_id' => 10000005, 'slug' => 'read-platform-bill', 'name' => 'Read bill']);
        DB::table('permissions')->insert(['id' => 10000008, 'parent_id' => 10000005, 'slug' => 'update-platform-bill', 'name' => 'Update bill']);

        DB::table('permissions')->insert(['id' => 10000010, 'slug' => 'access-platform-payments', 'name' => 'Bills', 'url' => '/admin/payments']);
        DB::table('permissions')->insert(['id' => 10000011, 'parent_id' => 10000010, 'slug' => 'create-platform-payment', 'name' => 'Create Payment']);
        DB::table('permissions')->insert(['id' => 10000012, 'parent_id' => 10000010, 'slug' => 'read-platform-payment', 'name' => 'Read Payment']);
        DB::table('permissions')->insert(['id' => 10000013, 'parent_id' => 10000010, 'slug' => 'update-platform-payment', 'name' => 'Update Payment']);


        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000000]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000001]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000002]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000003]);

        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000005]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000006]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000007]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000008]);

        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000010]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000011]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000012]);
        DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => 10000013]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permissions');
    }
};
