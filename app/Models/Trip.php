<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'front_page',
        'banner',
        'day',
        'outstanding',
        'first_email',
        'second_email',
        'price',
        'price_real',
        'type_trips',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function includes()
    {
        return $this->hasMany(Includes::class);
    }

    public function excludeds()
    {
        return $this->hasMany(Excluded::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function suggestions()
    {
        return $this->hasMany(Suggestion::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function highSeasons()
    {
        return $this->hasMany(HighSeason::class);
    }

    public function lowSeasons()
    {
        return $this->hasMany(LowSeason::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function saleDeliveries()
    {
        return $this->hasMany(SaleDelivery::class);
    }

    //
    public function promoinns()
    {
        return $this->hasMany(PromoInn::class);
    }

    public function packageDeliveries()
    {
        return $this->hasMany(PackageDelivery::class);
    }
}
