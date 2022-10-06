<?php

namespace Database\Seeders;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        ProjectFactory::times(5)->create();
    }
}
