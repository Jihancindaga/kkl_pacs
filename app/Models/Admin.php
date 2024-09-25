<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'alamat',
        'no_telp',
        'jenis_kelamin',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Mutator untuk meng-hash password sebelum disimpan ke database.
     *
     * @param string $password
     */
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    /**
     * Mengatur kolom yang harus ditampilkan dalam JSON response.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'nip' => $this->nip,
            'jabatan' => $this->jabatan,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'jenis_kelamin' => $this->jenis_kelamin,
        ];
    }
}
