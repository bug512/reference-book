<?php

namespace App\Models;

use App\Contracts\Customers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerJson implements Customers
{
    use HasFactory;

    /**
     * @var string
     */
    public $full_name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $phone;

    /**
     * @return mixed|void
     */
    public function storage()
    {

    }

    /**
     * @return mixed
     */
    public function showAll()
    {

    }
}
