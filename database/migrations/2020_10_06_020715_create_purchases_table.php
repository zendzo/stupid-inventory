<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_id');
            $table->string('code',10);
            $table->string('purchase_type_id');
            $table->date('purchase_date');
            $table->date('sent_date');
            $table->string('description');
            $table->integer('paid_amount')->nullable();
            $table->boolean('completed')->default(false)->nullable();
            $table->boolean('confirmed_by_admin')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
