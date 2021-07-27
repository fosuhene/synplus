<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //passing banners from db
         $brands = Brand::orderBy('id', 'DESC')->get();
         return view('backend.brand.index', compact('brands'));
    }


    public function brandStatus(Request $request){
        //dd($request->all());

        if($request->mode == 'true'){
            DB::table('brands')->where('id', $request->id)->update(['status' => 'active']);
            return response()->json(['msg' => 'Status changed to active', 'status' => true]);
        }else{
            DB::table('brands')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request
        $this->validate($request, [
            'title' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'required',                       
            'status' => 'string|required',
        ]);

        $data = $request->all();

        $slug = Str::slug($request->input('title'));
        $slug_count = Brand::where('slug', $slug)->count();

        if($slug_count > 0){
            $slug .= time(). '-'.$slug;
        }

        $data['slug'] = $slug;

       // return $data; 
        $status = Brand::create($data);
        if($status){
            return redirect()->route('brand.index')->with('success', 'Successfully created banner.');
        }else{
            return back()-with('error', 'Something went wrong!');
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
        $brand = Brand::find($id);
        if($brand){
            return view('backend.brand.edit', compact('brand'));
        }else{
            return back()->with('error', 'Data not found');
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
        $brand = Brand::find($id);
        if($brand){
           
            //$request
            $this->validate($request, [
                'title' => 'string|required',
                'description' => 'string|nullable',
                'photo' => 'required',         
            ]);

             $data = $request->all();
      
             $status = $brand->fill($data)->save();
                if($status){
                    return redirect()->route('brand.index')->with('success', 'Successfully updated brand.');
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
        $brand = Brand::find($id);
        if($brand){
            $status = $brand->delete();
            if($status){
               return redirect()->route('brand.index')->with('success', 'Brand successfully deleted');
            }else{
                return back()->with('error', 'something went wrong');
            }
            
        }else{
            return back()->with('error', 'Data not found');
        }
    }
}
