<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_siswa' => $this->faker->name,
            'id_kelas_ref' => $this->faker->numberBetween(1,55),
            'email_siswa' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'alamat' => $this->faker->address,
            'status' => 'aktif'
        ];
    }
}
