<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            ['id'=>1,'name'=>'Priyanshu Chouhan','type'=>'superadmin', 'mobile'=>7339996617, 'email'=>'priynshuchouhn@icloud.com','password'=>'$2a$12$/9KmdLev7/XBHDwwqmfkFepmstQY6KAAOl98pprSVUWA9iqhm4zAO','status'=>1,'image'=>'', 'vendor_id'=>0]
        ];

        Admin::insert($adminRecords);
    }
}
