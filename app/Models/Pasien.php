<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'nik',
        'nama',
        'tanggal_lahir',
        'gender',
        'agama',
        'perkawinan',
        'pekerjaan',
        'hp',
        'alamat',
        'faskes',
        'nomor_fakses',
        'kk',
        'kk_alamat'
    ];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'pasiens', 'length' => 10, 'prefix' =>'PAS-']);
        });
    }

    public function medrecs()
    {
        return $this->hasMany(Medrec::class,'pasien');
    }
}
