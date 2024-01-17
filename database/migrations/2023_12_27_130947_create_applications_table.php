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
		Schema::create('applications', function (Blueprint $table) {
			$table->id();
			$table->string('full_name', 50);
			$table->string('email', 50);
			$table->foreignId('course_id')->constrained()->onDelete('cascade');
			$table->date('application_date');
			$table->enum('status', array('pending', 'approved', 'rejected'))-> default('pending');
			$table->timestamps();
		});
	}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application');
    }
};
