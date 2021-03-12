<?php

namespace App\Models;

use App\Contracts\Customers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMysql extends Model implements Customers
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone',
    ];

    /**
     * @return mixed|void
     */
    public function storage()
    {
        $this->save();
    }

    public function showAll()
    {
        return $this::all();
    }
}
