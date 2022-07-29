<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Validator;
use Redirect;
use DB;
use Auth;
use Carbon\Carbon;

use App\Models\MemberCategory;
use App\Models\CustomField;
use App\Models\HeadParent;
use App\Models\UserType;
use App\Models\General;

class SettingController extends Controller{

   // All settings
   public function settings(){
      $data['categories'] = MemberCategory::all();
      $data['customFields'] = CustomField::where('type', '!=', null)->get();
      $data['userTypes'] = UserType::all();
      $data['headParents'] = HeadParent::all();
      $data['general'] = General::first();

      return view('admin.settings', $data);
   }
  
   // Add member category
   public function addCategory(Request $request){

      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'paymentType'=>'required',
         'reg_fee'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      ($request->paid =='yes') ? $percentage=$request->percentage : $percentage='';
      ($request->paymentType =='Monthly') ? $monthly=$request->monthly : $monthly='';

      MemberCategory::insert([
         'created_by' => Auth::user()->name,
         'name' => $request->name,
         'paymentType' => $request->paymentType,
         'reg_fee' => $request->reg_fee,
         'percentage' => $percentage,
         'monthly' => $monthly
      ]);
      return back()->with('success','New category add successfully');
   }

   // Edit Category
   public function editCategory($model, $id, $tab){
      $data['edit'] = DB::table($model)->find($id);  
      return view('admin.setting-edit', $data);
   }

   public function editCategory2(Request $request){
      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'paymentType'=>'required',
         'reg_fee'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      ($request->paid =='yes') ? $percentage=$request->percentage : $percentage='';
      ($request->paymentType =='Monthly') ? $monthly=$request->monthly : $monthly='';

      MemberCategory::where('id', $request->id)->update([
         'created_by' => Auth::user()->name,
         'name' => $request->name,
         'paymentType' => $request->paymentType,
         'reg_fee' => $request->reg_fee,
         'percentage' => $percentage,
         'monthly' => $monthly
      ]);

      // $data['categories'] = MemberCategory::all();
      // $data['customFields'] = CustomField::where('type', '!=', null)->get();
      // $data['userTypes'] = UserType::all();
      // $data['headParents'] = HeadParent::all();
      // $data['general'] = General::first();

      // return view('admin.settings', $data);
      return Redirect::to('settings');
   }

   // Add Custom Field 
   public function addCustomField(Request $request){
      
      // Field type
      if($request->has('text')){
         $name = 'text';
      }
      if($request->has('date')){
         $name = 'date';
      }
      if($request->has('dropdown')){
         $name = 'dropdown';
      }
      
      ($request->required == 'on') ? $required = '1' : $required = '0';
      
      $data = $request->all();
      $data[$name] = preg_replace("/\s+/", "_", request($name));

      $validator = Validator::make($data, [
         $name=>'required|unique:custom_fields,name'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }
   
      $table  = 'members';
      $column = $data[$name];
      $tab = 'customField';

      if($name=='field' || $name=='dropdown'){
         $addColumn = DB::select("ALTER TABLE $table ADD $column VARCHAR(255) after status");
      }else{
         $addColumn = DB::select("ALTER TABLE $table ADD $column date DEFAULT NULL after status");
      }

      if($addColumn > 0){
         if ($name=='dropdown'){
            CustomField::insert([
               'created_by' => Auth::user()->name,
               'type' => $name,
               'name' => $column,
               'required' => $required
            ]);
            $dropdownValue = $request->input('dropdownValue');
            foreach ($dropdownValue as $value){
               CustomField::insert([
                  'created_by' => Auth::user()->name,
                  'name' => $column,
                  'child' => $value          
               ]);
            }
         }else{
            CustomField::insert([
               'created_by' => Auth::user()->name,
               'type' => $name,
               'name' => $column,
               'required' => $required
            ]);
         }
      }else{
         return back()->with('fail', 'Column add fail')->withInput(['tab' => $tab]);
      }

      return back()->with('success', 'Column add successfully')->withInput(['tab' => $tab]);      
   }

   // Delete custom field
   public function deleteCustomField($id, $model, $tab){
      $itemId = DB::table($model)->find($id);
      $table  = 'members';
      $column = $itemId->name;

      // custom_fields
      DB::table($model)->where('id', $id)->delete();

      //dropdown
      DB::table($model)->where('name', $itemId->name)->delete();
      
      // members
      DB::select("ALTER TABLE $table DROP $column");
      return back()->with('success', 'Column delete successfully')->withInput(['tab' => $tab]);
   }

   // Add user type 
   public function addUserType(Request $request){
      
      $validator = Validator::make($request->all(), [
         'name'=>'required|unique:user_types'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $tab = 'userType';
      UserType::insert([
         'created_by' => Auth::user()->name,
         'name' => $request->name
      ]);
      return back()->with('success', 'User type add successfully')->withInput(['tab' => $tab]);      
   }

   // Add head parents 
   public function addHeadParent(Request $request){
      
      $validator = Validator::make($request->all(), [
         'name'=>'required|unique:head_parents'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $tab = 'headParent';
      HeadParent::create([
         'created_by' => Auth::user()->name,
         'name' => $request->name
      ]);
      return back()->with('success', 'Head parent add successfully')->withInput(['tab' => $tab]);      
   }

   // Add general 
   public function addGeneral(Request $request){

      $tab = 'general';

      if($request->id==null){
         $validator = Validator::make($request->all(),[
            'company_name'=>'required',
            'company_address'=>'required',
            // 'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);

         if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
         }

         $path="images/general/";
         $default="default.jpg";
         if ($request->hasFile('photo')){
            if($files=$request->file('photo')){
               $photo = $request->photo;
               $fullName=time().".".$photo->getClientOriginalExtension();
               $files->move(public_path($path), $fullName);
               $photoLink = $path . $fullName;
            }
         }else{
            $photoLink = $path . $default;
         }

         General::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_logo' => $photoLink
         ]);
         return back()->with('success','General info save successfully')->withInput(['tab' => $tab]);
      
      }else{

         $path="images/general/";
         if ($request->hasFile('photo')){
            
            $validator = Validator::make($request->all(),[
               'company_name'=>'required',
               'company_address'=>'required',
               'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if($validator->fails()){
               $messages = $validator->messages();
               return Redirect::back()->withErrors($validator);
            }

            if($files=$request->file('photo')){
               $photo = $request->photo;
               $fullName=time().".".$photo->getClientOriginalExtension();
               $files->move(public_path($path), $fullName);
               $photoLink = $path . $fullName;
            }
         }else{
            $photoLink =$request->photoName;
         }

         General::where('id', $request->id)->update([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_logo' => $photoLink
         ]);
         return back()->with('success','General info update successfully')->withInput(['tab' => $tab]);
      }

   }
   
}
