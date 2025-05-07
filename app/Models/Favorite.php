<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['item_id',];

    /**
     * このお気に入りが属するアイテム (itemモデルとの関係を定義)
     *
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
