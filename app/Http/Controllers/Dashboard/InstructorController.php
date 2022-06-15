<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Dashboard\Instructor\UpgradeRequest;
use App\Interfaces\SpecializationRepositoryInterface;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;


class InstructorController extends Controller
{
  private $userRepoInterface, $specializationRepoInterface;

  public function __construct(UserRepositoryInterface $userRepoInterface ,SpecializationRepositoryInterface $specializationRepoInterface)
  {
    $this->userRepoInterface = $userRepoInterface;
    $this->specializationRepoInterface = $specializationRepoInterface;
  }


  public function upgrade($id, Request $request)
  {
    $user = $this->userRepoInterface->find($id, $request);
    $specializations = $this->specializationRepoInterface->all();
    return view('web.pages.instructor.upgrade', compact('user','specializations'));
  }
  public function handleUpgrade(UpgradeRequest $request, $id)
  {
    $attributes = [
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'whatsapp' => $request->whatsapp,
      'facebook' => $request->facebook,
      'area_id' => $request->area,
    ];
    // dd($attributes);
    $user = $this->userRepoInterface->update($attributes, $id, $request);
    dd($user);

    $user->specializations->sync($request->specializations);
    return back()->with('message', 'User upgeaded to instructor successfully');
  }
}
