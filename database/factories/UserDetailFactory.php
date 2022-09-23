<?php

namespace Database\Factories;

use App\Models\Kontrak;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailFactory extends Factory
{
    
    public $number = 2;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kontrak = Kontrak::pluck('id')->toArray();
        return [
            'user_id' => $this->number++,
            'no_hp' => $this->faker->phoneNumber(),
            'tmp_lahir'=> $this->faker->city(),
            'tgl_lahir' => $this->faker->date(),
            'tgl_bergabung' => $this->faker->dateTimeBetween('-8 years', 'now'),
            'kontrak_id' => $this->faker->randomElement($kontrak),
            'gol' => $this->faker->randomElement([1,2]),
            'sta_kerja' => 'status',
            'sta_nikah' => 'sudah',
            'sta_pajak' => 'lunas',
            'no_bpjs_tk' => $this->faker->randomNumber(5, true),
            'no_bpjs_kes' => $this->faker->randomNumber(5, true),
            'no_dpa' => $this->faker->randomNumber(5, true),
            'no_npwp' => $this->faker->randomNumber(5, true),
            'no_ktp' => $this->faker->randomNumber(5, true),
            'alamat_dom' =>$this->faker->address(),
            'alamat_ktp' =>$this->faker->address(),
            'nama_istri' => $this->faker->name('female'),
            'jml_anak' => $this->faker->numberBetween(0, 5),
            'nama_anak1' => $this->faker->name(),
            'nama_anak2' => $this->faker->name(),
            'nama_anak3' => $this->faker->name(),
            'status' => 'aktif',
        ];
    }
}
