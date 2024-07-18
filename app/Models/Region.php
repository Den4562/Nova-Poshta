<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    // Указываем имя таблицы
    protected $table = 'regions';

    // Указываем заполняемые поля
    protected $fillable = ['name', 'countries_id'];

    // Определяем отношение с моделью Country
    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id');
    }

    // Определяем отношение с моделью PopulatedArea
    public function populatedAreas()
    {
        return $this->hasMany(Populate_area::class, 'region_id');
    }
}
