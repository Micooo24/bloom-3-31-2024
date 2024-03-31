<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function list(){
        // $products = Product::all();
        // return view('product.list', compact('products'));

        $products = Product::latest()->paginate(5);
     
        return view('product.list',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index()
    {
        $products = Product::all();
        dd($products);
        return view('dashboard', compact('products'));
    }

    
  public function display()
  {
      $products = Product::all();
      return view('welcome')->with('products', $products);
  }

 

    public function create()
    {
        return view('product.create');
    }

//     public function store(Request $request)
// {
    
//     $request->validate([
//         'product_name' => 'required',
//         'product_description' => 'required',
//         'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
//         'product_price' => 'required|numeric',
//     ]);

//     $product = new Product();
//     $product->product_name = $request->product_name;
//     $product->product_description = $request->product_description;
//     $product->product_price = $request->product_price;

//     // Define destination path for the image
//     // $destinationPath = '/products_images';

//     // if ($request->hasFile('product_image')) {
//     //     $image = $request->file('product_image');
//     //     $imageName = time().'.'.$image->getClientOriginalExtension(); // Added time to avoid overwriting files with the same name
//     //     // Move the uploaded file to the destination path
//     //     $image->move(public_path($destinationPath), $imageName);
//     //     $product->product_image = $destinationPath . '/' . $imageName; // Adjusted field name and added destination path
//     // }

//     // $product->save();


//     // $input = $request->all();
   
//     //     if ($image = $request->file('product_image')) {
//     //         $destinationPath = 'product_images/';
//     //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//     //         $image->move($destinationPath, $profileImage);
//     //         $input['product_image'] = "$profileImage";
//     //     }
     
//     //     Product::create($input);

//     if ($request->hasFile('product_image')) {
//         $image = $request->file('product_image');
//         $imageName = time().'.'.$image->getClientOriginalExtension(); // Added time to avoid overwriting files with the same name
//         // Move the uploaded file to the images directory
//         $image->move(public_path('product_images'), $imageName);
//         $product->product_image = $imageName;
//     } else {
//         // If no image is provided, return with an error
//         return redirect()->back()->withErrors(['product_image' => 'Please select an image.'])->withInput();
//     }

//     $product->save();

//     return redirect()->route('products.list')->with('success', 'Product created successfully.');
// }


public function store(Request $request)
{
    $request->validate([
        'product_name' => 'required',
        'product_description' => 'required',
        'product_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        'product_price' => 'required|numeric',
    ]);

    $product = new Product();
    $product->product_name = $request->product_name;
    $product->product_description = $request->product_description;
    $product->product_price = $request->product_price;

    $imagePaths = [];

    if ($request->hasFile('product_image')) {
        foreach ($request->file('product_image') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('product_image'), $imageName);
            $imagePaths[] = $imageName;
        }
    }

    // Concatenate image paths into a single string with comma as delimiter
    $product->product_image = implode(',', $imagePaths);

    $product->save();

    return redirect()->route('products.list')->with('success', 'Product created successfully.');
}




public function show(Product $product)
{
    
    return view('product.show', compact('product'));
}



public function edit(Product $product)
{
    return view('product.edit', compact('product'));

}


// public function update(Request $request, Product $product)
// {
//     $request->validate([
//         'product_name' => 'required',
//         'product_description' => 'required',
//         'product_price' => 'required|numeric',
//     ]);

//     $product->update([
//         'product_name' => $request->product_name,
//         'product_description' => $request->product_description,
//         'product_price' => $request->product_price,
//     ]);

//     if ($request->hasFile('product_image')) {
//         $image = $request->file('product_image');
//         $imageName = time().'.'.$image->getClientOriginalExtension(); // Added time to avoid overwriting files with the same name
//         // Move the uploaded file to the images directory
//         $image->move(public_path('product_images'), $imageName);
//         $product->product_image = $imageName;
//     }

//     $product->save();

//     return redirect()->route('products.list')->with('success', 'Product updated successfully.');
// }


public function update(Request $request, Product $product)
{
    $request->validate([
        'product_name' => 'required',
        'product_description' => 'required',
        'product_price' => 'required|numeric',
        'product_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
    ]);

    $product->update([
        'product_name' => $request->product_name,
        'product_description' => $request->product_description,
        'product_price' => $request->product_price,
    ]);

    $imagePaths = [];

    if ($request->hasFile('product_image')) {
        foreach ($request->file('product_image') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('product_image'), $imageName);
            $imagePaths[] = $imageName;
        }

        // Delete old images
        if ($product->product_image) {
            $oldImages = explode(',', $product->product_image);
            foreach ($oldImages as $oldImage) {
                if (file_exists(public_path('product_image/' . $oldImage))) {
                    unlink(public_path('product_image/' . $oldImage));
                }
            }
        }

        // Concatenate new image paths into a single string with comma as delimiter
        $product->product_image = implode(',', $imagePaths);
    }

    $product->save();

    return redirect()->route('products.list')->with('success', 'Product updated successfully.');
}

public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.list')->with('success', 'Product deleted successfully.');
}


public function search(Request $request){
    $search = $request->search;
    
    $products = Product::where(function ($query) use ($search) {
        $query->where('product_name', 'LIKE', '%'.$search.'%');
    })
    ->orWhere(function ($query) use ($search) {
        $query->where('product_description', 'LIKE', '%'.$search.'%');
    }) 
    ->paginate(10); // Paginate the results with 10 items per page
    
    if (Auth::user()->usertype === 'admin') {
        return view('product.list', compact('products', 'search'));
    } else {
        return view('dashboard', compact('products', 'search'));
    }
}
}
