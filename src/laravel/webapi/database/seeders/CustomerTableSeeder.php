<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $custmers = [
            ['id' => 1, 'name' => 'masdua', 'hash' => null ],
            ['id' => 2, 'name' => 'ohsaki', 'hash' => null ],
            ['id' => 3, 'name' => 'higashi', 'hash' => null ],
            ['id' => 4, 'name' => 'admin', 'hash' => null ],
            ['id' => 5, 'name' => 'test1', 'hash' => null ],
            ['id' => 6, 'name' => 'test2', 'hash' => null ],
            ['id' => 7, 'name' => 'test3', 'hash' => null ],
        ];

        foreach ($custmers as $custmer) {
            Customer::create($custmer);
        }

    }
}
