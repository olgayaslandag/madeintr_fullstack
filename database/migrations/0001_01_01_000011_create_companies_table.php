<?php

use App\Models\City\CityModel;
use App\Models\Logo\LogoModel;
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

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('webpage');
            $table->text('desc');
            $table->foreignIdFor(CityModel::class, 'city_id')
                ->constrained()
                ->onDelete('restrict');
            $table->foreignIdFor(LogoModel::class, 'logo_id')
                ->nullable()
                ->constrained()
                ->onDelete('restrict');
            $table->integer('franchising');
            $table->foreignIdFor(UserModel::class, 'created_by')
                ->constrained()
                ->onDelete('restrict');
            $table->foreignIdFor(UserModel::class, 'updated_by')
                ->nullable()
                ->constrained()
                ->onDelete('restrict');
            $table->timestamps();

            $table->unique(['name', 'city_id']);
            $table->index(['name', 'city_id', 'logo_id', 'created_by', 'updated_by']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
