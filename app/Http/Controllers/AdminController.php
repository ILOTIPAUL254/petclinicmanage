<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\PseudoTypes\True_;

class AdminController extends Controller
{
   
    public function addview()
    {
        $categry=Category::all();
        return view('admin.add_product',compact('categry'));
    }
    public function upload(Request $request)
    {
        $products= new Product;
        if($request->hasFile('image'))
        {
             $file=$request->file('image');
             $ext=$file->getClientOriginalExtension();
             $filename=time().'.'.$ext;
             $file->move('productimage',$filename);
             $products->image=$filename;      
        }
        $products->cate_id=$request->input('cate_id');
        $products->name=$request->input('name');
        $products->slug=$request->input('slug');
        $products->small_description=$request->input('small_description');
        $products->description=$request->input('description');
        $products->original_price=$request->input('original_price');
        $products->selling_price=$request->input('selling_price');
        $products->tax=$request->input('tax');
        $products->qty=$request->input('qty');
        $products->status=$request->input('status')==TRUE ? '1':'0';
        $products->trending=$request->input('trending')==TRUE ? '1':'0';
        $products->meta_title=$request->input('meta_title');
        $products->meta_keywords=$request->input('meta_keywords');
        $products->meta_description=$request->input('meta_description');
       
        $products->save();
        return redirect()->back()->with('status',"Product Added successfully");
    }
    public function blogview()
    {
        return view('admin.add_blog')->with('posts',Post::orderBy('updated_at','DESC')->get());
    }
    public function uploadblog(Request $request)
    {
        $blog= new post;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('postimage',$imagename);
        $blog->image=$imagename;
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->save();
        return redirect()->back()->with('message','Blog created successfully');

    }
     public function addcategory()
     {
         return view('admin.category');
     }
     public function insert_category(Request $request)
     {
         $category =new Category();
        if($request->hasFile('image'))
        {
             $file=$request->file('image');
             $ext=$file->getClientOriginalExtension();
             $filename=time().'.'.$ext;
             $file->move('categoryimage',$filename);
             $category->image=$filename;      
        }
             
            
         $category->name=$request->input('name');
         $category->slug=$request->input('slug');
         $category->description=$request->input('description');
         $category->status=$request->input('status')==TRUE ? '1':'0';
         $category->status=$request->input('popular')==TRUE ? '1':'0';
         $category->meta_title=$request->input('meta_title');
         $category->meta_keywords=$request->input('meta_keywords');
         $category->meta_descrip=$request->input('meta_description');
         $category->save();
         return redirect()->back()->with('status',"category Added Succefully");
     }
     public function categories()
     {
         $category= Category::all();
         return view('admin.categori',compact('category'));
     }
     public function edit($id)
     {
         
         $category=Category::find($id);
         return view('admin.edit_category',compact('category'));
        

     }
     public function update(Request $request, $id)
     {
         $category=Category::find($id);
         if($request->hasFile('image'))
         {
             $path='categoryimage'.$category->image;
             if(File::exists($path))
             {
                 File::delete($path);
             }
             $file=$request->file('image');
             $ext=$file->getClientOriginalExtension();
             $filename=time().'.'.$ext;
             $file->move('categoryimage',$filename);
             $category->image=$filename; 
         }
         $category->name=$request->input('name');
         $category->slug=$request->input('slug');
         $category->description=$request->input('description');
         $category->status=$request->input('status')==TRUE ? '1':'0';
         $category->status=$request->input('popular')==TRUE ? '1':'0';
         $category->meta_title=$request->input('meta_title');
         $category->meta_keywords=$request->input('meta_keywords');
         $category->meta_descrip=$request->input('meta_description');
         $category->update();
         return redirect()->back()->with('status',"Category  was updated Successfully");
     }
     public function delete($id)
     {
        $category=Product::find($id);
         if($category->image)
         {
             $path='categoryimage'.$category->image;
             if(File::exists($path))
             {
                 File::delete($path);
             }
         }
         $category->delete();
         return redirect()->back()->with('status',"Category Deleted successfully");
     }
     public function product_view()
     {
         $products=Product::all();
         return view('admin.productview',compact('products'));
     }
     public function editproduct($id)
     {
         
         $product=product::find($id);
         return view('admin.edit_product',compact('product'));
        

     }
     public function updateproduct(Request $request, $id)
     {
         $product=product::find($id);
         if($request->hasFile('image'))
         {
             $path='productimage'.$product->image;
             if(File::exists($path))
             {
                 File::delete($path);
             }
             $file=$request->file('image');
             $ext=$file->getClientOriginalExtension();
             $filename=time().'.'.$ext;
             $file->move('productimage',$filename);
             $product->image=$filename; 
         }
         $product->name=$request->input('name');
         $product->slug=$request->input('slug');
         $product->description=$request->input('description');
         $product->status=$request->input('status')==TRUE ? '1':'0';
         $product->trending=$request->input('trending')==TRUE ? '1':'0';
         $product->meta_title=$request->input('meta_title');
         $product->meta_keywords=$request->input('meta_keywords');
         $product->meta_description=$request->input('meta_description');
         $product->update();
         return redirect()->back()->with('status',"product  was updated Successfully");
     }
     public function deleteproduct($id)
     {
         $product=product::find($id);
         if($product->image)
         {
             $path='productimage'.$product->image;
             if(File::exists($path))
             {
                 File::delete($path);
             }
         }
         $product->delete();
         return redirect()->back()->with('status',"product Deleted successfully");
     }
     public function showappointment()
     {
         $data=Appointment::all();
         return view('admin.showappointment',compact('data'));
     }
}
