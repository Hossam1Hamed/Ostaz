<?php 

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Dashboard\Employee\addRequest;
use App\Interfaces\AttachmentRepositoryInterface;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller 
{
  use HelperTrait;
  private $employeeRepository, $attachmentRepository, $roleRepository;

  public function __construct(EmployeeRepositoryInterface $employeeRepository, AttachmentRepositoryInterface $attachmentRepository, RoleRepositoryInterface $roleRepository)
  {
    $this->employeeRepository = $employeeRepository;
    $this->attachmentRepository = $attachmentRepository;
    $this->roleRepository = $roleRepository;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $this->middleware(['permission:employees_index']);  
    $data=[
      'list' => $this->employeeRepository->allEmployee(),
    ];
    return view('web.pages.employee.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $this->middleware(['permission:employees_create']);  
    $data=[
      'list' => $this->roleRepository->all(),
    ];
    return view('web.pages.employee.add',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(addRequest $request)
  {
    $this->middleware(['permission:employees_create']);  
    $request->merge(['password' => Hash::make('password'), 'type' => User::TYPE_EMPLOYEE]);
    $employee = $this->employeeRepository->create($request->all());
    $this->employeeRepository->assignRole($employee, $request->role);
    if ($request->hasFile('image')) {
      $image = $this->uploadImages($request->image , 'employee/avatars');
   }else{
    $image = 'assets/img/logo.png';
   }
    $this->attachmentRepository->create(
      [
        'attachmentable_id' => $employee->id,
        'attachmentable_type' => 'App\Models\User',
        'file' => $image,
      ]
    ); 
    return redirect()->route('employees.index')->with('success', 'Employee Added Succesfully'); 
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $this->middleware(['permission:employees_view']);  
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $this->middleware(['permission:employees_edit']);  
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $this->middleware(['permission:employees_edit']);  
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id, Request $request)
  {
    $this->middleware(['permission:employees_delete']);  
    $this->employeeRepository->destroy($id, $request);
    return redirect()->route('employees.index')->with('success', 'Employee Deleted Succesfully');
  }
  
}

?>