<?php

use App\Models\Role;

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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();

            $table->enum('role', [
                Role::IS_ADMIN, Role::IS_CLIENT, Role::IS_TRAINER, Role::IS_GYM
            ])->default(Role::IS_TRAINER)->unique();
            $table->string('title', 250);
            $table->text('description');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
