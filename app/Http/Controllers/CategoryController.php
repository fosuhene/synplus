<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //passing categories from db
         $categories = Category::orderBy('id', 'DESC')->get();
         return view('backend.category.index', compact('categories'));
    }

    public function categoryStatus(Request $request){
        //dd($request->all());

        if($request->mode == 'true'){
            DB::table('categories')->where('id', $request->id)->update(['status' => 'active']);
            return response()->json(['msg' => 'Status changed to active', 'status' => true]);
        }else{
            DB::table('categories')->where('id', $request->id)->update(['status' => 'inactive']);
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
        return view('backend.category.create');
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
         //$request
         $this->validate($request, [
            'title' => 'string|required',
            'photo' => 'required',
            'is_parent' => 'integer|nullable',            
            'summary' => 'string|nullable',
            'parent_id' => 'integer|nullable',               
            'status' => 'string|required',
        ]);

        $data = $request->all();

        $slug = Str::slug($request->input('title'));
        $slug_count = Category::where('slug', $slug)->count();

        if($slug_count > 0){
            $slug .= time(). '-'.$slug;
        }

        $data['slug'] = $slug;

       // return $data; 

        $status = Category::create($data);
        if($status){
            return redirect()->route('category.index')->with('success', 'Successfully created category.');
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
        $category = Category::find($id);
        if($category){
            return view('backend.category.edit', compact('category'));
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
        $category = Category::find($id);
        if($category){
           
            //$request
       $this->validate($request, [
           'title' => 'string|required',
           'summary' => 'string|nullable',
           'photo' => 'required',  
       ]);

       $data = $request->all();

      
       $status = $category->fill($data)->save();
       if($status){
           return redirect()->route('category.index')->with('success', 'Successfully updated category.');
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
        $category = Category::find($id);
        if($category){
            $status = $category->delete();
            if($status){
               return redirect()->route('category.index')->with('success', 'Category successfully deleted');
            }else{
                return back()->with('error', 'something went wrong');
            }
            
        }else{
            return back()->with('error', 'Data not found');
        }
    }
}
