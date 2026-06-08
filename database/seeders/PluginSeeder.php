<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PluginSeeder extends Seeder
{
    public function run(): void
    {
        $plugins = [
            [
                'name' => 'Blog',
                'slug' => 'blog',
                'provider' => 'Platform\\Plugins\\Blog\\Providers\\BlogServiceProvider',
                'status' => 1,
            ],
        ];

        foreach ($plugins as $plugin) {
            $exists = DB::table('plugins')
                ->where('slug', $plugin['slug'])
                ->first();

            if (!$exists) {
                DB::table('plugins')->insert(array_merge($plugin, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }
    }
}
