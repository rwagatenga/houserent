<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Property;
use App\Contact;
use App\Message;

use DB;
use Redirect;
use Auth;
//use Hash;
use Validator;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        // $password = str_random(10);
        // $email = 'fred@gmail.com';
        // $to = 'fredrwagatenga@gmail.com';
        //         $subject = 'House Rent Rwanda';
        //         $header = 'House Rent Rwanda';
        //          $message = 'Welcome'
        //         . 'Your email and password is following :'
        //         . 'Email:' . $email . ''
        //         . 'Your new password : ' . $password . ''
        //         . 'Now you can login with this email and password';
        // $headers = 'From: Your name <'.$email .'>' . "\r\n";
        // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

        // mail($to, $subject, $message, $headers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/buttons', [
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
        $password = 'fred1234';
        $rules = [
            'family_name', 'other_name' => 'required|min:3|max:255',
            'email' => 'email|max:255',
            'telephone' => 'required|regex:/[0-9]{10}/',
            'province', 'district', 'sector' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:100',
            'house_type' => 'required',
            'bedroom' => 'integer',
            'bathroom' => 'integer',
            'kitchen' => 'integer',
            'parking' => 'integer',
            'price' => 'required|integer',
            'negotiate' => 'required',
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpg, jpeg',
            'my_file' => 'required',
            'my_file.*' => 'image',//|mimes:jpg, jpeg|max:10127',
            'price' => 'required',
            'details' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $message = $validator->messages();
          if ($message) {
            return redirect()->back()->withInput()->with('errors', $message);
          }
        }
        else {
            $user_id = User::where('telephone', '=', $request->telephone)->orWhere('email', '=', $request->email)->first();
            if (!$user_id) {
                $file = $request->file('photo');
                $filen = $request->photo->getClientOriginalName();
                $filename = $request->other_name . time() . $filen;
                $distination = public_path().'/rent_images';
                $file->move($distination, $filename);
                    
                    foreach ($request->file('my_file') as $images) {
                        $name = $images->getClientOriginalName();
                        $names = $request->other_name . time() . $name;
                        $images->move(public_path().'/rent_images', $names);
                        $datas[] = $names;
                    }
                    $user = new User();
                    $user->first_name=$request->family_name;
                    $user->last_name=$request->other_name;
                    $user->telephone=$request->telephone;
                    $user->email=$request->email;
                    $user->role='Owner';
                    $user->before=$password;
                    $user->password=Hash::make($password);
                    $user->save();

                    $store = new Property();
                    $store->province=$request->province;
                    $store->district=$request->district;
                    $store->sector=$request->sector;
                    $store->address=$request->address;
                    $store->house_class=$request->house_class;
                    $store->house_type=$request->house_type;
                    $store->bedroom=$request->bedroom;
                    $store->bathroom=$request->bathroom;
                    $store->kitchen=$request->kitchen;
                    $store->parking=$request->parking;
                    $store->price=$request->price;
                    $store->currency=$request->currency;
                    $store->negotiate=$request->negotiate;
                    $store->commission=$request->commission;
                    $store->first_photo=$filename;
                    $store->inside_photos=json_encode($datas);
                    $store->details=$request->details;
                    $store->status=1;
                    $store->latitude=$request->latitude;
                    $store->longitude=$request->longitude;
                    $store->user_id=$user->id;
                    $store->agent_id=Auth::user()->id;


                    if ($store->save()) {
                        return redirect()->back()->with('success', 'Successful Uploaded');
                    }
                    else {
                        return redirect()->back()->with('errors', 'Something went wrong');
                    }
                }
                else{
                    $file = $request->file('photo');
                    $filen = $request->photo->getClientOriginalName();
                    $filename = $request->other_name . time() . $filen;
                    $distination = public_path().'/rent_images';
                    $file->move($distination, $filename);
                        
                        foreach ($request->file('my_file') as $images) {
                            $name = $images->getClientOriginalName();
                            $names = $request->other_name .time() . $name;
                            $images->move(public_path().'/rent_images', $names);
                            $datas[] = $names;
                        }

                        $store = new Property();
                        $store->province=$request->province;
                        $store->district=$request->district;
                        $store->sector=$request->sector;
                        $store->address=$request->address;
                        $store->house_class=$request->house_class;
                        $store->house_type=$request->house_type;
                        $store->bedroom=$request->bedroom;
                        $store->bathroom=$request->bathroom;
                        $store->kitchen=$request->kitchen;
                        $store->parking=$request->parking;
                        $store->price=$request->price;
                        $store->currency=$request->currency;
                        $store->negotiate=$request->negotiate;
                        $store->commission=$request->commission;
                        $store->first_photo=$filename;
                        $store->inside_photos=json_encode($datas);
                        $store->details=$request->details;
                        $store->status=1;
                        $store->latitude=$request->latitude;
                        $store->longitude=$request->longitude;
                        $store->user_id=$user_id->id;
                        $store->agent_id=Auth::user()->id;

                        if ($store->save()) {
                            return redirect()->back()->with('success', 'Successful Uploaded');
                        }
                        else {
                            return redirect()->back()->with('errors', 'Something went wrong');
                        }
                }
            
            }
        } catch(Exception $e) {
            report($e);

            return false;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit = User::findOrFail($id);
        $views = User::where('id', '=', $edit->id)->get();
        return view('back/updateProfile', compact('views'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
        'first_name','last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',//|unique:users',
        'telephone' => 'required|regex:/[0-9]{10}/',
        'password' => 'required|string|min:6|',//confirmed',
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        // Validation failed;
        return redirect()->back();//->withInputs();
      }
      else{
        $update = User::findOrFail($id);
        if (Hash::check($request->password, $update->password)) {
            // return Redirect::back()->withErrors('errors', 'Old are not match');
            $update->first_name=$request->first_name;
            $update->last_name=$request->last_name;
            $update->telephone=$request->telephone;
            $update->email=$request->email;
            $update->password=Hash::make($request->new_passowrd);
            $update->before=NULL;
            $update->save();
            return redirect('/home');
        }
        else {
             return Redirect::back()->withErrors(['errors', 'Old are not match']);
        }
      }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view()
    {
        $all = DB::table('users')
        ->join('properties', 'users.id', '=', 'properties.user_id')
        ->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/propertyTables', [
            'all' => $all,
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);
    }

    public function read($id)
    {
        $find = Property::findOrFail($id);
        $reads = DB::table('users')
        ->join('properties', 'users.id', '=', 'properties.user_id')
        ->where('properties.id', '=', $find->id)
        ->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/searched', [
            'reads' => $reads,
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);
    }

    public function enable($id)
    {
        $find = Property::findOrFail($id);
        $enable = Property::where('id', '=', $id)->update(array('status' => 1));
        // $find = Property::onlyTrashed()->delete();//->get();
        
        return redirect('admin/viewProperty')->with(['success', 'Enabled for Public View']);
    }

     public function disable($id)
    {
        $find = Property::findOrFail($id);
        $enable = Property::where('id', '=', $id)->update(array('status' => 0));
        return redirect('admin/viewProperty')->with(['success', 'Enabled for Public View']);
    }

    public function editProperty(Request $request, $id)
    {
        //
        $rules = [
            'family_name', 'other_name' => 'required|min:3|max:255',
            'email' => 'email|max:255',
            'telephone' => 'required|regex:/[0-9]{10}/',
            'province', 'district', 'sector' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:100',
            'house_type' => 'required',
            'price' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $message = $validator->messages();
          if ($message) {
            return redirect()->back()->withInput()->with('errors', $message);
          }
        }
        else {
            $find = Property::findOrFail($id);
            $store = DB::table('users')
                    ->join('properties', 'users.id', '=', 'properties.user_id')
                    ->where('properties.id', '=', $find->id)
                    ->first();
                if (empty($request->file('photo') || $request->file('my_file'))) {

                    $store = DB::table('users')
                    ->join('properties', 'users.id', '=', 'properties.user_id')
                    ->where('properties.id', '=', $find->id)
                    ->update(array(
                        'users.first_name' => $request->family_name,
                        'users.last_name' => $request->other_name,
                        'users.email' => $request->email,
                        'users.telephone' => $request->telephone,
                        'properties.province' => $request->province,
                        'properties.district' => $request->district,
                        'properties.sector' => $request->sector,
                        'properties.address' => $request->address,
                        'properties.house_class' => $request->house_class,
                        'properties.house_type' => $request->house_type,
                        'properties.bedroom' => $request->bedroom,
                        'properties.bathroom' => $request->bathroom,
                        'properties.kitchen' => $request->kitchen,
                        'properties.parking' => $request->parking,
                        'properties.price' => $request->price,
                        'properties.commission' => $request->commission,
                        'properties.details' => $request->details,
                        'properties.status' => 1,
                        'properties.latitude' => 1,
                        'properties.longitude' => 1,
                    ));
                if ($store) {
                     return redirect()->back()->with('success', 'Successful Uploaded');
                }
                else{
                    return redirect()->back()->withInput()->with('errors', 'Something went wrong');
                }
            }
            else {
                $rules = [

                'family_name', 'other_name' => 'required|min:3|max:255',
                'email' => 'email|max:255',
                'telephone' => 'required|regex:/[0-9]{10}/',
                'province', 'district', 'sector' => 'required|min:3|max:255',
                'address' => 'required|min:3|max:100',
                'house_type' => 'required',
                'price' => 'required',
                'photo' => 'required',
                'photo.*' => 'image|mimes:jpg, jpeg',
                'my_file' => 'required',
                'my_file.*' => 'image',
                ];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    $message = $validator->messages();
                  if ($message) {
                    return redirect()->back()->withInput()->with('errors', $message);
                  }
                }
                else {
                    $file = $request->file('photo');
            $filename = $request->photo->getClientOriginalName();
            $distination = public_path().'/rent_images';
            $file->move($distination, $filename);
                
                foreach ($request->file('my_file') as $images) {
                    $names = $images->getClientOriginalName();
                    $images->move(public_path().'/rent_images', $names);
                    $datas[] = $names;
                }
                    $store = DB::table('users')
                    ->join('properties', 'users.id', '=', 'properties.user_id')
                    ->where('properties.id', '=', $find->id)
                    ->update(array(
                        'users.first_name' => $request->family_name,
                        'users.last_name' => $request->other_name,
                        'users.email' => $request->email,
                        'users.telephone' => $request->telephone,
                        'properties.province' => $request->province,
                        'properties.district' => $request->district,
                        'properties.sector' => $request->sector,
                        'properties.address' => $request->address,
                        'properties.house_class' => $request->house_class,
                        'properties.house_type' => $request->house_type,
                        'properties.bedroom' => $request->bedroom,
                        'properties.bathroom' => $request->bathroom,
                        'properties.kitchen' => $request->kitchen,
                        'properties.parking' => $request->parking,
                        'properties.price' => $request->price,
                        'properties.commission' => $request->commission,
                        'properties.first_photo' => $filename,
                        'properties.inside_photos' => json_encode($datas),
                        'properties.details' => $request->details,
                        'properties.status' => 1,
                        'properties.latitude' => 1,
                        'properties.longitude' => 1,
                    ));
                    if ($store) {
                     return redirect()->back()->with('success', 'Successful Uploaded');
                }
                else{
                    return redirect()->back()->withInput()->with('errors', 'Something went wrong');
                }
                    }

            }
        }
    }

    public function adminView()
    {
        
        $all = User::withTrashed()->where('id', '!=', Auth::user()->id)->where('role', '=', 'Agent')->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/viewUser', [
            'all' => $all, 
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);

    }

    public function ownerView()
    {
        
        $all = User::withTrashed()->where('id', '!=', Auth::user()->id)->where('role', '=', 'Owner')->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/viewOwner', [
            'all' => $all, 
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);

    }

    public function addUsers()
    {
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/addUser', [
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);
    }

    public function addUser(Request $request)
    {
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        $rules = [
            'family_name' => 'required|min:3|max:100',
            'other_name' => 'required|min:3|max:100',
            'telephone' => 'required|unique:users|regex:/[0-9]{10}/',
            'email' => 'required|email|max:255|unique:users',
            'province' => 'required|',
            'district' => 'required',
            'sector' => 'required',
            'role' => 'required',
            'details' => 'required|min:3|max:50000'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            $message = $validator->messages();
            if ($message) {

                return redirect()->back()->withInput()->with('errors', $message);
                }
            }
            else {
                $file = $request->file('photo');
                $filename = $request->photo->getClientOriginalName();
                $distination = public_path().'/passport';
                $file->move($distination, $filename);

                $password = 'fred1234';
                $user = new User();
                $user->first_name=$request->family_name;
                $user->last_name=$request->other_name;
                $user->telephone=$request->telephone;
                $user->email=$request->email;
                $user->details=$request->details;
                $user->province=$request->province;
                $user->district=$request->district;
                $user->sector=$request->sector;
                $user->role=$request->role;
                $user->passport=$filename;
                $user->before=$password;
                $user->password=Hash::make($password);
                if ($user->save()) {
                    return redirect()->back()->withInput()->with(['success', 'Successfully Added']);
                }
                else {
                    return redirect()->back()->withInput()->with(['errors', 'Something went wrong']);
                }
            }
    }

    public function delete($id)
    {
        $find = User::findOrFail($id);
        $delete = User::withTrashed()->where('id', '=', $find->id)->delete();
        return redirect('admin/viewUsers');

    }

    public function restore($id)
    {
        $find = User::findOrFail($id);
        $restore = User::onlyTrashed()->where('id', '=', $find->id)->restore();
        return redirect('admin/viewUsers');
    }

    public function messages()
    {
        $all = Message::latest()->where('user_id', '=', Auth::user()->id)->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/messages', [
            'all' => $all,
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti

        ]);
    }

    public function readMessage($id)
    {
        $update = Message::where('id', '=', $id)->update(array(
            'status' => 0,
        ));
        $all = Message::where('id', '=', $id)->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();

        return view("back/readMessage", [
            'all' => $all,
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);
    }

    public function notifications()
    {
        $all = Contact::latest()->get();//where('user_id', '=', Auth::user()->id)->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/notifications', [
            'all' => $all,
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti

        ]);
    }

    public function readNotifications($id)
    {
        $update = Contact::where('id', '=', $id)->update(array(
            'status' => 0,
        ));
        $all = Contact::where('id', '=', $id)->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();

        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();

        return view("back/readMessage", [
            'all' => $all,
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);
    }
    public function test(){
        // $test = 100,000;
        // return string($test);
    }
}







