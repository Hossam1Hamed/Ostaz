<?php

namespace App\Interfaces;

use Illuminate\Http\Request ;

interface UserRepositoryInterface
{
     function search(Request $request);
   
}