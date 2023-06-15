<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function fetchproduct()
    {
        $product = Product::all();
        return response()->json([
            'product'=>$product,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'description'=>'required|max:500',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ]); 

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors()
            ]);
        }
        else
        {
            $product = new Product;
            $product->name = $request->input('name');
            $product->description = $request->input('description');

            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/products/', $filename);
                $product->image = $filename;
            }
            $product->save();

            return response()->json([
                'status'=>200,
                'message'=>'Product Image Data Added Successfully'
            ]);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if($product)
        {
            return response()->json([
                'status'=>200,
                'product'=>$product
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Product Not Found'
            ]);
        }
    }
    

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'description'=>'required|max:500'
        ]); 

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors()
            ]);
        }
        else
        {
            $product = Product::find($id);
            if($product)
            {

                $product->name = $request->input('name');
                $product->description = $request->input('description');

                if($request->hasFile('image'))
                {
                    $path = 'uploads/products/'.$product->image;
                    if(File::exists($path))
                    {
                         File::delete($path);
                    }

                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' .$extension;
                    $file->move('uploads/products/', $filename);
                    $product->image = $filename;
                }
                $product->save();

                return response()->json([
                    'status'=>200,
                    'message'=>'Product Image Data Updated Successfully'
                ]);

            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Product Not Found'
                ]);
            }
            
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        {
            $path = 'uploads/products/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $product->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Product Delete Image Successfully'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Product Not Found'
            ]);
        }
    }

}
