<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\appointment;
use App\Models\Category;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(auth::user()->usertype=='0')
            {
                
                $product=product::where('trending','1')->take(10)->get();
                $trending=category::where( 'popular','0')->take(10)->get();
                return view('user.home',compact('product','trending'));
            }
            else
            {
                return view('admin.home');
            }

        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {
        $product=product::where('trending','1')->take(10)->get();
        $trending=category::where( 'popular','0')->take(10)->get();
        return view('user.home',compact('product','trending'));
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function details($id)
    {
        return Product::find($id);
    }
    public function appointment(Request $request)
    {
        $data= new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->department=$request->department;
        $data->status='in progress';
        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }
        
        $data->save();
        return redirect()->back()->with('message','appointment  send successfully we will get back to you soon');
        
    }
    
    public function myappointment()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }
        
    }
    public function cancel_appoint($id)
    {
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function category()
    {
        $category= Category::where('status','0')->get();
        return view('user.category',compact('category'));
    }
    public function viewcategory($slug)
    {
       if(Category::where('slug',$slug)->exists())
       {
           $category=Category::where('slug',$slug)->first();
           $products=Product::where('cate_id',$category->id)->where('status','0')->get();
           return view('user.productsview',compact('category','products'));
           
       }
       else
           {
               return redirect('')->back()->with('status',"slug doesnot exists");
           }
    }
    public function pdetails($category_slug,$item_slug)
    {
        if(Category::where('slug',$category_slug)->exists())
        {
            if(product::where('slug',$item_slug)->exists())
            {
                $products=Product::where('slug',$item_slug)->first();
                return view('user.productdetails',compact('products'));

            }
            else 
            {
                return redirect()->back()->with('status',"link was broken");
            }
        }
        else
        {
            return redirect()->back()->with('status',"category not found");
        }
    }
}
