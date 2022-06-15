<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function search(Request $request)
    {
        //Why whereIn get one row ????!!!!!!!
        return $this->model->where('status', 1)->whereIn('type', [3,4,5] )
            // ->where(function ($query) use ($request) {

            //     if ($request->filled('email')) {
            //         $query->where('email', 'like', '%' . $request->email . '%');
            //     }
            //     if ($request->type) {
            //         // dd($request->type);
            //         $query->where('type', $request->type);
            //     }
            // })
            ->orderBy('id')
            ->paginate(8);
    }
}
