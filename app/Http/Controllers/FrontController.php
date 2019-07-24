<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
//use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\User;
use App\Property;
use App\Contact;
use App\Message;
//use App\Subscriber;
use Auth;
use DB;
use Redirect;
use Validator;
use Session;
//use Newsletter;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $high = Property::latest('id')->where('commission', '=', 'High')->where('status', '=', 1)->get();
        $look = Property::latest('id')->where('status', '=',  1)->paginate(10);//->get();
        $search = DB::table('properties')
            // ->select('properties.*')
              ->DISTINCT()
              ->get(['house_type', 'house_class', 'price']);
              // return $search;
              // exit();
              $s = DB::table('properties')
            // ->select('properties.*')
              ->DISTINCT()
              ->get(['house_type', 'house_class']);
        $hot = Property::latest()->where('commission', '=', 'High')->where('status', '=', 1)->take(4)->get();
              
        return view('/front/index', [
            'look' => $look, 
            'high' => $high,
            'search' => $search,
            's' => $s,
            'hot' => $hot
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function details($id)
    {
        
        $find = Property::findOrFail($id);
        $read = DB::table('users')
        ->join('properties', 'users.id', '=', 'properties.user_id')
        ->where('properties.id', '=', $find->id)
        ->get();
        $agent = User::where('id', '=', $read[0]->agent_id)->get();
         $distination = json_decode($read[0]->inside_photos, true);
         $hot = Property::latest()->where('commission', '=', 'High')->where('status', '=', 1)->take(3)->get();
         $search = DB::table('properties')
            ->select('properties.*')
              ->DISTINCT()
              ->get(['house_type']);
        return view('front/propertyDetails',[
            'read' => $read,
            'distination' => $distination,
            'agent' => $agent,
            'hot' => $hot,
            'search' => $search
        ]);
    }

    public function search(Request $request)
    {
        // $search = DB::table('properties')
        // ->select('properties.*')
        // ->orWhere('district', 'like', '%' . $request->search . '%')
        // ->orWhere('sector', 'like', '%' . $request->search . '%')
        // ->orWhere('province', 'like', '%' . $request->search . '%')
        // ->orWhere('house_class', 'like', '%' . $request->house_class . '%')
        // ->orWhere('house_type', 'like', '%' . $request->house_type . '%')
        // ->orWhereBetween('price', array([0, 100, 150, 200]))
        // ->get();
        // $search = Property::where('sector', '=', $request->search )
        // ->orderBy('id','DESC')
        // ->paginate(6);
        if ((Property::where('sector', '=', $request->search )->get())) {
            $search = Property::where('sector', '=', $request->search )
        ->orderBy('id','DESC')
        ->paginate(6);
            $hot = Property::latest()->where('commission', '=', 'High')->take(3)->get();
            $all = Property::get();
            return view('front/buysalerent', [
                'search' => $search, 
                'all' => $all,
                'hot' => $hot
                ]);
        }
        else
            if((Property::where('house_class', '=', $request->house_class )
        ->get())) {
           
            $search = Property::where('house_class', '=', $request->house_class )
        ->orderBy('id','DESC')
        ->paginate(6);
            $hot = Property::latest()->where('commission', '=', 'High')->take(3)->get();
            $all = Property::get();
             return view('front/buysalerent', [
                'search' => $search, 
                'all' => $all,
                'hot' => $hot
                ]);
            }

        // else 
        //     $search = Property::where('house_type', '=', $request->house_type )
        //     ->orderBy('id','DESC')
        //     ->paginate(6);
        //     if ($search[0]->house_type == $request->house_type) {
        //     $hot = Property::latest()->where('commission', '=', 'High')->take(3)->get();
        //     $all = Property::get();
        //      return view('front/buysalerent', [
        //         'search' => $search, 
        //         'all' => $all,
        //         'hot' => $hot
        //         ]);
        //     }
        else {
            return redirect()->back()->with('Errors', 'Result not Found');
        }
    }

    public function agent()
    {
        $agents = User::where('role', '=', 'Admin')->orWhere('role', '=', 'Agent')->paginate(6);
        return view('front/agents', [
            'agents' => $agents,
        ]);
    }

    public function contact()
    {
        return view('front/contact');
    }

    public function contactStore(Request $request)
    {
        $rules = [
            'fullNames' => 'required|min:3|max:100',
            'email' => 'required|email',
            'phone' => 'regex:/[0-9]{10}/',
            'message' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            $message = $validator->messages();
            if ($message) {

                return redirect()->back()->withInput()->with('errors', $message);
                }
            }
            else {
                $contact = new Contact();
                $contact->full_names=$request->fullNames;
                $contact->email=$request->email;
                $contact->phone=$request->phone;
                $contact->message=$request->message;
                $contact->status=1;
                if ($contact->save()) {
                    return redirect()->back()->with('success', 'Successful Contacted waiting to respond you through Email');
                }
                else {
                    return redirect()->back()->withInput()->with('errors', $message);
                }
            }
    }

    public function messageStore(Request $request, $id)
    {
        $rules = [
            'fullNames' => 'required|min:3|max:100',
            'email' => 'required|email',
            'phone' => 'regex:/[0-9]{10}/',
            'message' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            $message = $validator->messages();
            if ($message) {

                return redirect()->back()->withInput()->with('errors', $message);
                }
            }
            else {
                $messages = new Message();
                $messages->full_names=$request->fullNames;
                $messages->email=$request->email;
                $messages->phone=$request->phone;
                $messages->message=$request->message;
                $messages->user_id=$id;
                $messages->status=1;
                if ($messages->save()) {
                    return redirect()->back()->with('success', 'Successful Contacted waiting to respond you through Email');
                }
                else {
                    return redirect()->back()->withInput()->with('errors', $message);
                }
            }
    }

    public function buy()
    {
        $search = Property::latest()->where('house_type', '=', 'Buy')->where('status', '=', 1)->paginate(6);
         $all = Property::get();
         $hot = Property::latest()->where('commission', '=', 'High')->where('status', '=', 1)->get();
         $count = $search->count();
        if (!$search) {
            return view('front.404');
            
        }
        else {
            return view('front/buysalerent', [
            'search' => $search,
            'all' => $all,
            'count' => $count,
            'hot' => $hot
        ]);
        }
    }

    public function sale()
    {
        $search = Property::latest()->where('house_type', '=', 'Sale')->where('status', '=', 1)->paginate(6);
         $all = Property::get();
         $count = $search->count();
         $hot = Property::latest()->where('commission', '=', 'High')->where('status', '=', 1)->get();
        if (!$search) {
            return view('front.404');
            
        }
        else {
            return view('front/buysalerent', [
            'search' => $search,
            'all' => $all,
            'count' => $count,
            'hot' => $hot
        ]);
        }
    }

    public function rent()
    {
        $search = Property::latest()->where('house_type', '=', 'Rent')->where('status', '=', 1)->paginate(6);
        $all = Property::get();
        $count = $search->count();
        $hot = Property::latest()->where('commission', '=', 'High')->where('status', '=', 1)->get();
        if (!$search) {
            return view('front.404');
            
        }
        else {
            return view('front/buysalerent', [
            'search' => $search,
            'all' => $all,
            'count' => $count,
            'hot' => $hot
        ]);
        }
        
    }
    public function blank()
    {

        $all = DB::table('users')
        ->join('properties', 'users.id', '=', 'properties.user_id')
        ->get();
        $numbers = Message::latest()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->get();
        $number = $numbers->count();
        $notify = Contact::latest()->where('status', '=', 1)->get();
        $noti = $notify->count();
        return view('back/blank', [
            'all' => $all,
            'numbers' => $numbers,
            'number' => $number,
            'notify' => $notify,
            'noti' => $noti
        ]);
    }

}