<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = ['symbol', 'side', 'qty', 'entry_price', 'exit_price', 'traded_on', 'notes'];

    protected function casts(): array
    {
        return ['traded_on' => 'date'];
    }

    public function user() { return $this->belongsTo(User::class); }
    public function tags() { return $this->belongsToMany(Tag::class); }

    // $trade->pnl works like a property
    protected function pnl(): Attribute
    {
        return Attribute::get(function () {
            if ($this->exit_price === null) {
                return null;
            }
            $diff = $this->side === 'BUY'
                ? $this->exit_price - $this->entry_price
                : $this->entry_price - $this->exit_price;
            return round($diff * $this->qty, 2);
        });
    }
}
