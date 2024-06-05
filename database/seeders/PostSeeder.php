<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'user_id' => 2,
            'description' => "ou may type-hint any dependencies you need within the run method's signature. They will automatically be resolved via the Laravel service container.",
            'text' => "laravel documnentation",
            'name' => 'laravel is good'
        ]);
    }
}