<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('consumer_price', 8, 2)->after('quantity');
            $table->decimal('purchase_price', 8, 2)->after('consumer_price');
        });
    }
    
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('consumer_price');
            $table->dropColumn('purchase_price');
        });
    }
    
};
