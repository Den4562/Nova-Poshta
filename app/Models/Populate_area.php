<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Populate_area extends Model
{
    use HasFactory;
    
    // Указываем имя таблицы
    protected $table = 'populate_areas';

    // Указываем заполняемые поля
    protected $fillable = ['name', 'region_id'];

    // Определяем отношение с моделью Region
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
