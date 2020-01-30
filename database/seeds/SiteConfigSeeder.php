<?php

use Illuminate\Database\Seeder;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SiteConfig::create([
            'site_id' => 1,
            'config' => config('hd.site')
        ]);
    }
}
