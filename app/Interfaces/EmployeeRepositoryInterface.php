<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Request;

interface EmployeeRepositoryInterface
{
    public function allEmployee($number = 15);
    public function assignRole($employee, $role_id);
}