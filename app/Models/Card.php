<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cards';

    protected $fillable = [
        'balance',
        'full_name',
        'card_number',
        'cvv',
        'date_month',
        'date_year',
        'currency',
        'status'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function status_msg()
    {
        if ($this->status == 1) {
            $message = 'Card is active';
        } elseif ($this->status == 0) {
            $message = 'Card is deactive';
        } elseif ($this->status == 2) {
            $message = 'Card has expired';
        } elseif ($this->status == 3) {
            $message = 'Card is blocked';
        } else{
            $message = 'Unknown status';
        }
        return $message;
    }
}
