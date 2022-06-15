<?php 

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class SpecializationController extends Controller 
{
  public function index()
  { 
    $specs = Specialization::with('attachments')->get();
    
    return view('web.pages.spec.index',compact('specs'));
  }

  public function create()
  {
    
  }

  public function store(Request $request)
  {
      $request->validate([
        'name'=> 'required|max:50',
      ]);
      $request_data=$request->all();
      if($request->image){
        Image::make($request->image)
              ->resize(300,null,function($constraint){
                $constraint->aspectRatio();
              })->save(public_path('uploads\specs\\'.$request->image->hashName()));
        $request_data['image']=$request->image->hashName();
      }
      $spec = Specialization::create($request_data);
      $attach = new Attachment();
      $attach->file = $request_data['image'];
      $spec -> attachments()->save($attach);
      if($spec){
        Session::flash('success','Specialization Created Successfully');
        return response()->json([
            'status' => true,
        ]);
    }else{
        Session::flash('error','Specialization doesn\'t Added , Try Again... ');
        return response()->json([
            'status' => false,
        ]);
    }

  }

  public function show($id)
  {
    return "show";
  }

  public function edit($id)
  {
    $spec = Specialization::where('id',$id)->with('attachments')->get();
    return view('web.pages.spec.edit',compact('spec'));
  }

  public function update(Request $request,Specialization $spec)
  {
    
      $newSpecData = $request->validate([
        'name' => 'required',
      ]);
      $attach = new Attachment();
        if($request->image){
          $attach->file = $request->file;
            if($attach->file != 'default.jpg'){
                Storage::disk('public_uploads')->delete('/specs//'.$attach->file);
            }
        }
        if($request->image){
          Image::make($request->image)
                ->resize(300,null,function($constraint){
                  $constraint->aspectRatio();
                })->save(public_path('uploads\specs\\'.$request->image->hashName()));
          $request_data['image']=$request->image->hashName();
        }
        $specialization = $spec->update($request_data);
        $attach->file = $request_data['image'];
        $spec -> attachments()->save($attach);
      if($specialization){
        return redirect()->route('specs.index')->with('success', 'Specialization Updated Succesfully');
      }else{
        return redirect()->route('roles.index')->with('error', 'Specialization not Updated');
      }
  } 

  public function destroy($id)
  {
    $spec = Specialization::where('id',$id)->delete();
    
    if($spec){
      return redirect()->route('specs.index')->with('success', 'Specialization Deleted Succesfully');
    }else{
      return redirect()->route('specs.index')->with('error', 'Specialization not Deleted');
    }
  }
  
}
