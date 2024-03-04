<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->renameColumn('customer', 'entity_name');
            $table->dropColumn(['address', 'shipment_date', 'delivery_date']);
            $table->enum('type', ['in', 'out'])->default('in')->after('customer');
            $table->enum('status', ['pending', 'in transit', 'delivered'])->default('pending')->change();
            $table->date('order_date')->default(now())->change();
        });
    }

    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->renameColumn('entity_name', 'customer');
            $table->text('address')->after('customer');
            $table->date('shipment_date')->nullable()->after('order_date');
            $table->date('delivery_date')->nullable()->after('order_date');
            $table->enum('status', ['pending', 'in transit', 'delivered'])->default('pending')->change();
        });
    }
};
