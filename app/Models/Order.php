<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'ttn', 'client_id', 'countries_id', 'region_id', 
        'populated_areas_id', 'payments_id', 'statuses_id', 'comentar'
    ];


    public static function boot()
{
    parent::boot();

    static::creating(function ($order) {
        // Форматирование текущей даты и времени
        $timestamp = now()->format('YmdHis');

        // Генерация случайного числа и приведение его к строке с длиной 6 символов
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Объединение двух частей для получения строки ttn длиной 20 символов
        $order->ttn = $timestamp . $randomNumber;
    });
}
    // Связи с другими моделями
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function populatedArea()
    {
        return $this->belongsTo(Populate_area::class, 'populated_areas_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payments_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'statuses_id');
    }
}
