<?php

namespace App\Contracts;

use Illuminate\Http\Request;

/**
 * Contract Actionable
 * @package App\Http\Contracts
 */
interface Actionable
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function action(Request $request);
}
