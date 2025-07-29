<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::create([
            'nama' => 'Taufik Putra',
            'username' => 'opikmz',
            'password' => Hash::make('opikmz'),
            'role' => 'admin',
            'cabang' => 'pusat',
        ]);
        \App\Models\User::create([
            'nama' => 'Ahmad Nadarul Furqon',
            'username' => 'ahmadnadarulfurqon',
            'password' => Hash::make('ahmadnadarulfurqon'),
            'role' => 'admin',
            'cabang' => 'pusat',
        ]);
        \App\Models\User::create([
            'nama' => 'Komite 1',
            'username' => 'komitesatu',
            'password' => Hash::make('komitesatu'),
            'role' => 'komite',
            'cabang' => 'pusat',
        ]);
        \App\Models\User::create([
            'nama' => 'Komite 2',
            'username' => 'komitedua',
            'password' => Hash::make('komitedua'),
            'role' => 'komite',
            'cabang' => 'pusat',
        ]);
        \App\Models\User::create([
            'nama' => 'Komite 3',
            'username' => 'komitetiga',
            'password' => Hash::make('komitetiga'),
            'role' => 'komite',
            'cabang' => 'pusat',
        ]);
        \App\Models\User::create([
            'nama' => 'Komite 4',
            'username' => 'komiteempat',
            'password' => Hash::make('komiteempat'),
            'role' => 'komite',
            'cabang' => 'pusat',
        ]);
        \App\Models\User::create([
            'nama' => 'Mancab Bantul',
            'username' => 'mancabbantul',
            'password' => Hash::make('mancabbantul'),
            'role' => 'mancab',
            'cabang' => 'bantul',
        ]);
        \App\Models\User::create([
            'nama' => 'Marketing Bantul 1',
            'username' => 'marketingbantulsatu',
            'password' => Hash::make('marketingbantulsatu'),
            'role' => 'marketing',
            'cabang' => 'bantul',
        ]);
        \App\Models\User::create([
            'nama' => 'Marketing Bantul 2',
            'username' => 'marketingbantuldua',
            'password' => Hash::make('marketingbantuldua'),
            'role' => 'marketing',
            'cabang' => 'bantul',
        ]);
        \App\Models\User::create([
            'nama' => 'Marketing Bantul 3',
            'username' => 'marketingbantultiga',
            'password' => Hash::make('marketingbantultiga'),
            'role' => 'marketing',
            'cabang' => 'bantul',
        ]);
        \App\Models\User::create([
            'nama' => 'Marketing Bantul 4',
            'username' => 'marketingbantulempat',
            'password' => Hash::make('marketingbantulempat'),
            'role' => 'marketing',
            'cabang' => 'bantul',
        ]);
        \App\Models\User::create([
            'nama' => 'Marketing Kretek 1',
            'username' => 'marketingkreteksatu',
            'password' => Hash::make('marketingkreteksatu'),
            'role' => 'marketing',
            'cabang' => 'kretek',
        ]);
        \App\Models\User::create([
            'nama' => 'Marketing Sanden 1',
            'username' => 'marketingsandensatu',
            'password' => Hash::make('marketingsandensatu'),
            'role' => 'marketing',
            'cabang' => 'sanden',
        ]);
        \App\Models\User::create([
            'nama' => 'Marketing Piyungan 1',
            'username' => 'marketingpiyunagansatu',
            'password' => Hash::make('marketingpiyungansatu'),
            'role' => 'marketing',
            'cabang' => 'piyungan',
        ]);
    }
}
