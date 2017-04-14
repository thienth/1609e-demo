<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
	/**
	* Get list category to display
	* @author: ThienTH
	* @date: 2017/03/20
	* @return: view
	*/
    public function index(){
    	// Get all category
    	$cateList = Category::paginate(APP_PAGE_SIZE);

    	// Return view with data
    	return view("admin.category.index", ["cateList" => $cateList]);
    }

    /**
    * Generate add new cate form
    * @author: ThienTH
    * @date: 2017/03/20
    * @return: view
    */
    public function addNew(){
        
        // Create new category object
        $model = new Category();
        $cateList = Category::all();

        // return form with empty model
        return view("admin.category.form", ["model" => $model, "cateList" => $cateList]);
    }

    /**
    * Generate update cate form
    * @author: ThienTH
    * @date: 2017/03/24
    * @return: view
    */
    public function update($id){
        // Neu id co thuc
        $model = Category::find($id);
        if($model){
           
            $cateList = Category::all();
            // return form with empty model
            return view("admin.category.form", 
                ["model" => $model, "cateList" => $cateList]);
        }

        return "Not found!";
        
    }

    /**
    * remove category by id
    * @author: ThienTH
    * @date: 2017/03/27
    * @return: view
    */
    public function remove(Request $request){
        // Neu id co thuc
        $model = Category::find($request->input("id"));
        if($model){
            // sleep(5);
            $remove = $model->delete();
            return response()->json(["data" => $remove]);
        }

        return response()->json(["data" => false]);
        
    }

    /**
	* Generate save  category
	* @author: ThienTH
	* @date: 2017/03/24
	* @return: redirect
	*/
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'cate_name' => [
                                'required',
                                'min:5',
                                Rule::unique('categories')->ignore($request->id, 'id')
                            ],
        ]);

        if ($validator->fails()) {
            // $messages = $validator->messages();
            // var_dump($messages);die;
            return redirect()->back()
                        ->withErrors($validator);
        }

        if($request->input('id')){

            $model = Category::find($request->input('id'));
        }else{

            $model = new Category();
        }
        $model->fill($request->all());
        if ($request->hasFile('imageFile')) {
            $file = $request->file('imageFile');
            $fileName = uniqueString($request->input('cate_name')) . "." . $file->extension();
            $path = $file->storeAs('uploads', $fileName);
            $model->feature_image = "/" . $path;

        }

        DB::beginTransaction();

        try{

            if($model->save()){

                DB::commit();
                return redirect(route("admin.cate.list"));
            }

            return "error!";

        }catch (\Exception $e){
            DB::rollback();

            dd($e->getMessage());
        }

    }
}
