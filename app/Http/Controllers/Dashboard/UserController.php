<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Dashboard\User\StoreUserRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
  private $userRepoInterface;
  public function __construct(UserRepositoryInterface $userRepoInterface)
  {
    $this->userRepoInterface = $userRepoInterface;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
    $users = $this->userRepoInterface->search($request);
      // dd($users);
    if ($users->isEmpty())
      return back()->with('message', 'There are not users');
    else
      return view('web.pages.user.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('web.pages.user.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
  }
}
