<?php   

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Traits\ApiTraits;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class BaseRepository implements BaseRepositoryInterface 
{
    use ApiTraits;
    protected $model; 

    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        $data = $this->model->create($attributes);
        return $data;
    }

    public function update(array $attributes, $id, $request)
    {
        if (null == $model = $this->model->find($id)) {
            if (!$request->expectsJson()) {
                throw new ModelNotFoundException("Model not found");
            }else{
                $this->responseJsonFailed('Model Not Found');
            }
        }
        $model->update($attributes);
        return $model;
    }

    public function find($id, $request ): ?Model
    {
        if (null == $model = $this->model->find($id)) {
            if (!$request->expectsJson()) {
                throw new ModelNotFoundException("Model not found");
            }else{
                $this->responseJsonFailed('Model Not Found');
            }
        }
        return $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function allWithPaginate($number = 15){
        return $this->model->paginate($number);
    }

    public function allWithPaginateExcept($id, $number = 15){
        return $this->model->where('id', '!=',  $id)->paginate($number);
    }

    public function destroy($id, $request)
    {
        if (null == $model = $this->model->find($id)) {
            if (!$request->expectsJson()) {
                throw new ModelNotFoundException("Model not found");
            }else{
                $this->responseJsonFailed('Model Not Found');
            }
        }
        return $model->delete();
    }

    public function groupBy($key){
        return $this->model->get()->groupBy($key)->toArray();
    }
}
