<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Testimoni;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $user = User::create([
                'email' => $row['nis'],
                'name' => $row['nama'],
                'password' => Hash::make("12345678"),
            ]);
            $user->assignRole('user');

            Siswa::create([
                'user_id' => $user->id,
                'jk' => $row['jk'],
                'tempat' => $row['tmpt_lahir'],
                'tanggal' => $row['tgl_lahir'],
                'telp' => $row['telp'],
                'tahun_id' => $row['tahun_id'],
                'sekolah' => $row['sekolah'],
            ]);
            
            Testimoni::create([
                'user_id' => $user->id,
                'sekolah' => $row['sekolah'],
            ]);
        }
    }
}
