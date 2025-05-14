<?php

use App\Models\Company\CompanyModel;
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
        Schema::create('prominent_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CompanyModel::class, 'company_id')
                ->constrained()
                ->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status_id')->default(1);
            $table->foreignIdFor(UserModel::class, 'created_by')
                ->constrained()
                ->onDelete('restrict');
            $table->foreignIdFor(UserModel::class, 'updated_by')
                ->nullable()
                ->constrained()
                ->onDelete('restrict');
            $table->timestamps();

            $table->index([
                'company_id',
                'created_by',
                'updated_by'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prominent_companies');
    }
};
