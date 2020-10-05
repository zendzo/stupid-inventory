<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            // $table->string('user_id');
            $table->string('name');
            $table->string('code',10);
            $table->string('sale_type_id');
            $table->date('sale_date');
            $table->date('sent_date');
            // $table->string('supplier_id');
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
        Schema::dropIfExists('sales');
    }
}
