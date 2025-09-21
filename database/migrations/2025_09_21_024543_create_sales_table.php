<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_sales');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('do_number')->nullable();
            $table->string('status')->default('open'); // open/final
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('sales');
    }
};
