<?php

namespace App\Repositories;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\User;
use App\Repositories\BaseRepository;


class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function allEmployee($number = 15){
        return $this->model->where('type', $this->model::TYPE_EMPLOYEE)->paginate($number);
    }

    public function assignRole($employee, $role_id){
        return $employee->assignRole($role_id);
    }
}