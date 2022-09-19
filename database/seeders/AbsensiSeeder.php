<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Shift;
use App\Models\Absensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::pluck('id')->toArray();
        $shift_list = Shift::pluck('id')->toArray();
        $user = array_diff($user, [1]);

        $dt = Carbon::create(2022, 5, 23, 0, 0, 0, 'Asia/Jakarta');
        $dt->locale('id');

        for ($i = 0; $i < 100; $i++) {
            foreach ($user as $value) {
                $shift = $shift_list[array_rand($shift_list)];
                $shift = Shift::find($shift);
                $jam_masuk = Carbon::create($dt->toDateString() . ' ' . $shift->jam_masuk, 'Asia/Jakarta');
                $jam_pulang = Carbon::create($dt->toDateString() . ' ' . $shift->jam_pulang, 'Asia/Jakarta');

                $jam_masuk_user = rand(-35, 15);
                $jam_pulang_user = rand(-15, 35);

                if ($jam_masuk_user > 0) {
                    $status = 'telat';
                } else if ($jam_pulang_user < 0) {
                    $status = 'pulang cepat';
                } else {
                    $status = 'tepat waktu';
                }

                $jam_masuk->addMinutes($jam_masuk_user);
                $jam_pulang->addMinutes($jam_pulang_user);

                $absensi = [
                    'user_id' => $value,
                    'shift_id' => $shift->id,
                    'tanggal' => $dt->toDateString(),
                    'jam_masuk' => $jam_masuk->format('H:i:s'),
                    'jam_pulang' => $jam_pulang->format('H:i:s'),
                    'status' => $status,
                ];
                Absensi::create($absensi);
            }

            if ($dt->dayName == 'Jumat') $dt->add(3, 'day');
            else $dt->add(1, 'day');
        }
    }
}
