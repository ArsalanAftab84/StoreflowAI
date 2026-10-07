<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@storeflow.ai',
        ]);

        $category = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'Latest gadgets and tech.',
            'image_url' => 'https://images.unsplash.com/photo-1498049794561-7780e7231661?q=80&w=600&auto=format&fit=crop'
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'AI Smart Speaker',
            'slug' => 'ai-smart-speaker',
            'description' => 'A smart speaker integrated with an AI agent.',
            'price' => 199.99,
            'stock' => 50,
            'image_url' => 'https://images.unsplash.com/photo-1543512214-318c7553f230?q=80&w=600&auto=format&fit=crop'
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Automated Desk Lamp',
            'slug' => 'automated-desk-lamp',
            'description' => 'Desk lamp that adjusts to your workflow.',
            'price' => 79.99,
            'stock' => 100,
            'image_url' => 'https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?q=80&w=600&auto=format&fit=crop'
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Workflow Keyboard',
            'slug' => 'workflow-keyboard',
            'description' => 'Mechanical keyboard with programmable macros.',
            'price' => 149.99,
            'stock' => 30,
            'image_url' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?q=80&w=600&auto=format&fit=crop'
        ]);
    }
}
