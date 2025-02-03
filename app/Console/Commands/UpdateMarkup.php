<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\MarkUpHistory;
use Carbon\Carbon;

class UpdateMarkup extends Command
{
    protected $signature = 'markup:set {percentage}';
    protected $description = 'Update retail prices based on markup percentage';

    public function handle()
    {
        $percentage = $this->argument('percentage');

        if (!is_numeric($percentage) || $percentage < 0) {
            $this->error('Invalid markup percentage!');
            return Command::FAILURE;
        }

        $products = Product::all();

        foreach ($products as $product) {
            $newPrice = $product->purchase_price * (1 + $percentage);
            $product->update(['retail_price' => $newPrice]);
        }

        MarkUpHistory::create([
            'date' => Carbon::now(),
            'mark_up_rate' => $percentage,
        ]);

        $this->info("Retail prices updated successfully with markup: {$percentage}.");
        return Command::SUCCESS;
    }
}

