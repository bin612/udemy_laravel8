<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 할 일 30개 만들어서 넣기
        $this->actory(class:\App\Models\Todo::class, amount:30)->create();
    }
}
