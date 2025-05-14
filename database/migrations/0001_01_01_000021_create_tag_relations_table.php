<?php

use App\Models\Company\CompanyModel;
use App\Models\Tag\TagModel;
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
        Schema::create('tag_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TagModel::class, 'tag_id')
                ->constrained()
                ->onDelete('restrict');
            $table->foreignIdFor(CompanyModel::class, 'company_id')
                ->constrained()
                ->onDelete('restrict');
            $table->foreignIdFor(UserModel::class, 'created_by')
                ->constrained()
                ->onDelete('restrict');
            $table->foreignIdFor(UserModel::class, 'updated_by')
                ->nullable()
                ->constrained()
                ->onDelete('restrict');
            $table->timestamps();

            $table->unique(['tag_id', 'company_id']);
            $table->index(['tag_id', 'company_id', 'created_by', 'updated_by']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_relations');
    }
};
