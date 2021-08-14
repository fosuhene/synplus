<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('id', 'DESC')->get();
        return view('backend.product.index', compact('products'));
    }

    public function productStatus(Request $request){
        //dd($request->all());

        if($request->mode == 'true'){
            DB::table('products')->where('id', $request->id)->update(['status' => 'active']);
            return response()->json(['msg' => 'Status changed to active', 'status' => true]);
        }else{
            DB::table('products')->where('id', $request->id)->update(['status' => 'inactive']);
            return response()->json(['msg' => 'Status changed to inactive', 'status' => true]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.product.create');
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
        //return $request->all();
        //currently logged user
        $user = Auth::user();
        $uid = Auth::id();

         $this->validate($request, [
            'name' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'available_qty' => 'nullable|numeric',
            'cost_price' => 'nullable|numeric',
            'markup_price' => 'nullable|numeric',
            'unit_cost' => 'nullable|numeric',
            'unit_price' => 'nullable|numeric',
            'photo' => 'required',  
            'brand_id' => 'nullable|exists:brands,id',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'item_size' => 'string|nullable',
            'status' => 'string|nullable',
            'conditions' => 'string|nullable',
            'vendor_id' => 'required|exists:users,id',
            'umeasure_id ' => 'nullable|exists:munits,id',           
            'conditions' => 'string|required',            
            'status' => 'string|required',
        ]);

        $data = $request->all();

        $slug = Str::slug($request->input('name'));
        $slug_count = Product::where('slug', $slug)->count();

        if($slug_count > 0){
            $slug .= time(). '-'.$slug;
        }

        $data['slug'] = $slug;

        $offerPrice1 = $request->cost_price + $request->markup_price;
        


        if($request->discount > 0){
            $discountPercentange = $request->discount / 100;
            $discountMargin = $offerPrice1 * $discountPercentange;

            $offerPrice = $offerPrice1 - $discountMargin;
        }else{
            $offerPrice = $offerPrice1;
        }

        $data['offer_price'] = $offerPrice;
        $data['entered_by'] = $uid;
       
       // return $data; 

        $status = Product::create($data);
        if($status){
            return redirect()->route('product.index')->with('success', 'Successfully created product.');
        }else{
            return back()-with('error', 'something went wrong!');
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
        /*
        $product = Product::find($id);
        if($product){
            return view('backend.product.view', compact(['product']));
        }else{
            return back()->with('error', 'Product not found');
        }
        */
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
        $product = Product::find($id);
        if($product){
            return view('backend.product.edit', compact('product'));
        }else{
            return back()->with('error', 'Product not found');
        }
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
        $product = Product::find($id);
        if($product){
           
            //$request
       $this->validate($request, [
           'name' => 'string|required',
           'description' => 'string|nullable',
           'photo' => 'required',              
           'conditions' => 'string|required', 
       ]);

       $data = $request->all();

      
       $status = $product->fill($data)->save();
       if($status){
           return redirect()->route('product.index')->with('success', 'Successfully updated product.');
       }else{
           return back()-with('error', 'Something went wrong!');
       }
      


        }else{
            return back()->with('error', 'Data not found');
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
        $product = Product::find($id);
        if($product){
            $status = $product->delete();
            if($status){
               return redirect()->route('product.index')->with('success', 'Product successfully deleted');
            }else{
                return back()->with('error', 'something went wrong');
            }
            
        }else{
            return back()->with('error', 'Data not found');
        }
    }
}
