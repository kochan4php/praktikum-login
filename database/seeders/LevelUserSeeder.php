<?php

namespace Database\Seeders;

use App\Models\LevelUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $levelUser = collect([
      [
        'nama_level' => 'admin',
      ],
      [
        'nama_level' => 'supplier',
      ],
      [
        'nama_level' => 'user',
      ],
    ]);
    $levelUser->each(fn ($lu) => LevelUser::create($lu));
  }
}
