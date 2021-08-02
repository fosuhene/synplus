<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Munit;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $stdate = date('d-m-Y');
           // $startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
           // $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour();

        return [
            //
            'name' => $this->faker->sentence(3, false),
            'slug' => $this->faker->unique()->slug,
            'summary' => $this->faker->sentence(2, false),
            'description' => $this->faker->paragraphs(3, true),
            'available_qty' => $this->faker->numberBetween(2,10),
            'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'cat_id' => $this->faker->randomElement(Category::where('is_parent', 1)->pluck('id')->toArray()),
            'child_cat_id' => $this->faker->randomElement(Category::where('is_parent', 0)->pluck('id')->toArray()),
            'photo' => $this->faker->imageUrl('400', '200'),
            'bar_code' => $this->faker->ean13,
            'unique_code' => $this->faker->uuid,
            'serial_number' => $this->faker->isbn10,
            'unit_cost' => $this->faker->randomDigit,
            'unit_price' => $this->faker->randomDigit,
            'cost_price' => $this->faker->randomDigit,
            'offer_price' => $this->faker->randomDigit,
            'markup_price' => $this->faker->randomDigit,            
            'discount' => $this->faker->randomDigit,
            'no' => Str::random(10),
            'item_size' => $this->faker->randomElement(['S','M','L','XL']),
            'color' => $this->faker->hexcolor,
            'entry_date' => $this->faker->date(),            
            'date_of_manufacture' => $this->faker->dateTimeBetween('-1 years', $stdate),
            'expiry_date' => $this->faker->dateTimeBetween($stdate, '+3 years'),
            'conditions' => $this->faker->randomElement(['new', 'popular']),
            'vendor_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'umeasure_id' => $this->faker->randomElement(Munit::pluck('id')->toArray()),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'entered_by'  => $this->faker->randomNumber,
        ];
    }
}
