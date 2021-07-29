<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('summary');
            $table->mediumText('description')->nullable();
            $table->integer('available_qty')->default(0);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->string('photo');
            $table->string('bar_code')->nullable();            
            $table->string('unique_code')->nullable();            
            $table->string('serial_number')->nullable();
            $table->float('unit_cost')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('cost_price')->default(0);
            $table->float('offer_price')->default(0);            
            $table->float('markup_price')->nullable();
            $table->string('no')->nullable();
            $table->float('discount')->default(0);
            $table->string('item_size');
            $table->string('color')->nullable();            
            $table->string('date_of_manufacture')->nullable();
            $table->string('entry_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->enum('conditions', ['new', 'popular'])->default('new');
            $table->unsignedInteger('vendor_id')->nullable();           
            $table->unsignedBigInteger('umeasure_id')->nullable(); 
            $table->enum('status', ['active', 'inactive'])->default('active');            
            $table->unsignedInteger('entered_by')->nullable();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('umeasure_id')->references('id')->on('munits')->onDelete('SET NULL');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->timestamps();

            /*
            $table->unsignedBigInteger('available_qty')->nullable(); /used
            $table->unsignedBigInteger('bar_code')->nullable(); /used
            $table->unsignedBigInteger('category')->nullable();  /used
            $table->unsignedBigInteger('color')->nullable();  /used
            $table->unsignedBigInteger('compare_price')->nullable();
            $table->unsignedBigInteger('cost_price')->nullable();  /used
            $table->unsignedBigInteger('date_of_manufacture')->nullable(); /used
            $table->unsignedBigInteger('description')->nullable();  /used
            $table->unsignedBigInteger('entered_by')->nullable(); /used
            $table->unsignedBigInteger('entry_date')->nullable(); /used
            $table->unsignedBigInteger('expiry_date')->nullable(); /used
            $table->unsignedBigInteger('features')->nullable();
            $table->unsignedBigInteger('file_name')->nullable();
            $table->unsignedBigInteger('file_type')->nullable();
            $table->unsignedBigInteger('inventory')->nullable();
            $table->unsignedBigInteger('item_group')->nullable();
            $table->unsignedBigInteger('item_size')->nullable();  /used
            $table->unsignedBigInteger('last_modified')->nullable();
            $table->unsignedBigInteger('markup_price')->nullable(); /used
            $table->unsignedBigInteger('name')->nullable(); /used
            $table->unsignedBigInteger('no')->nullable(); /used
            $table->unsignedBigInteger('preffered')->nullable();
            $table->unsignedBigInteger('reorder_level')->nullable(); 
            $table->unsignedBigInteger('sale_category')->nullable();
            $table->unsignedBigInteger('sale_qty')->nullable();
            $table->unsignedBigInteger('serial_number')->nullable(); /used
            $table->unsignedBigInteger('shelf_no')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->unsignedBigInteger('subtitute_exist')->nullable();
            $table->unsignedBigInteger('sync_date')->nullable();
            $table->unsignedBigInteger('unique_code')->nullable(); /used
            $table->unsignedBigInteger('unit_cost')->nullable(); /used
            $table->unsignedBigInteger('unit_of_measure')->nullable();
            $table->unsignedBigInteger('unit_price')->nullable(); /used
            $table->unsignedBigInteger('warn_for_expire')->nullable();
            $table->unsignedBigInteger('warning_duration')->nullable();
            $table->unsignedBigInteger('warning_type')->nullable();
            $table->unsignedBigInteger('umeasure_id')->nullable(); /used
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
