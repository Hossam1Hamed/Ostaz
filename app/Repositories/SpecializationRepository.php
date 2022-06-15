<?php

namespace App\Repositories;

use App\Interfaces\SpecializationRepositoryInterface;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationRepository extends BaseRepository implements SpecializationRepositoryInterface
{

    public function __construct(Specialization $model)
    {
        parent::__construct($model);
    }
}