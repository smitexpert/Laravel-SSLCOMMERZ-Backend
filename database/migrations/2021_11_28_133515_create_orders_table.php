<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tran_id');
            $table->float('total_amount');
            $table->string('cus_name')->nullable();
            $table->string('cus_email')->nullable();
            $table->string('cus_add1')->nullable();
            $table->string('cus_add2')->nullable();
            $table->string('cus_city')->nullable();
            $table->string('cus_state')->nullable();
            $table->string('cus_postcode')->nullable();
            $table->string('cus_country')->default('Bangladesh');
            $table->string('cus_phone')->nullable();
            $table->string('cus_fax')->nullable();

            $table->string('ship_name')->nullable();
            $table->string('ship_add1')->nullable();
            $table->string('ship_add2')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_state')->nullable();
            $table->string('ship_postcode')->nullable();
            $table->string('ship_phone')->nullable();
            $table->string('ship_country')->nullable();

            $table->string('shipping_method')->default('NO');
            $table->string('product_name')->nullable();
            $table->string('product_category')->default('Goods');
            $table->string('product_profile')->default('physical-goods"');
            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('orders');
    }
}
