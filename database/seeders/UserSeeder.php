<?php
/** @var \Illuminate\Database\Eloquent\Factory factory */
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(user::class)->create();
    }
}
