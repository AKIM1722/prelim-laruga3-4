<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;
use App\Models\MarkUpHistory;
use Carbon\Carbon;

class UpdateCategoryMarkup extends Command
{
    protected $signature = 'markup:set-category {percentage} {name}';
    protected $description = 'Update retail prices based on markup percentage for a specific category';

    public function handle()
    {
        $percentage = $this->argument('percentage');
        $categoryName = $this->argument('name');

        if (!is_numeric($percentage) || $percentage < 0) {
            $this->error('Invalid markup percentage!');
            return Command::FAILURE;
        }

        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            $this->error("Category '{$categoryName}' not found.");
            return Command::FAILURE;
        }

        $products = Product::where('category_id', $category->id)->get();

        foreach ($products as $product) {
            $newPrice = $product->purchase_price * (1 + $percentage);
            $product->update(['retail_price' => $newPrice]);
        }

        MarkupHistory::create([
            'date' => Carbon::now(),
            'mark_up_rate' => $percentage,
        ]);

        $this->info("Retail prices for category '{$categoryName}' updated with markup: {$percentage}.");
        return Command::SUCCESS;
    }
}

