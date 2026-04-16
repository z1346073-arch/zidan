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
        Schema::create( table: 'attractions', callback: function (Blueprint $table) {
            $table->id();
            $table->foreignId( column: 'destination_id')->constrained()->onDelete( action: 'cascade');
            $table->string( column: 'name',);
            $table->text( column: 'description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};
