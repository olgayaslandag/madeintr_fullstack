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
        Schema::create('logos', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->foreignIdFor(UserModel::class, 'created_by')
                ->constrained()
                ->onDelete('restrict');
            $table->foreignIdFor(UserModel::class, 'updated_by')
                ->nullable()
                ->constrained()
                ->onDelete('restrict');
            $table->timestamps();

            $table->index(['created_by', 'updated_by']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logos');
    }
};
