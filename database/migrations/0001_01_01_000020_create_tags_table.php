<?php

use App\Models\User\UserModel;
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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('order');
            $table->string('slug');
            $table->foreignIdFor(UserModel::class, 'created_by')
                ->constrained()
                ->onDelete('restrict');
            $table->foreignIdFor(UserModel::class, 'updated_by')
                ->nullable()
                ->constrained()
                ->onDelete('restrict');
            $table->timestamps();

            $table->unique(['name', 'slug']);
            $table->index(['slug', 'created_by', 'updated_by']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
