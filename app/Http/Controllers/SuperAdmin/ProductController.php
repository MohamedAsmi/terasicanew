<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\SystemAdmin\UpdateProductRequest;
use App\Product;
use Yajra\DataTables\DataTables;


class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('is_superadmin');
    }
    
    
    public function index()
    {
         return view('superadmin.product');
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
    public function store(UpdateProductRequest $request)
    {
         Product::insertRow([
            'p_name' => $request->p_name,
            'osio' => $request->osio,
            'hinda' => $request->hinda,
            'v_muo' => $request->v_muo,
            'status' => $request->status,

        ]);

        return self::response('success', 'Created!');
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
       $products=Product::getById($id);
        return view('superadmin.models.products.edit')->with([
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        Product::updateById($id, $request->except('_token'));
        return self::response('success', 'Updated!');
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
    public function list(){
        $model =Product::get();

        return DataTables::of($model)
        ->addColumn('edit', function ($model) {
            return '<a href="javascript:void(0)" class="load-modal" title="Edit"
                        data-url="' . route('product.edit', ['id' => $model->id]) . '">
                        <i class="fas fa-edit"></i>
                    </a>';
        })
        ->addColumn('delete', function ($model) {
            return '<a href="javascript:void(0)" class="delete" title="Delete"
                        data-url="' . route('product.delete', ['id' => $model->id]) . '">
                            <i class="fas fa-trash text-danger"></i>
                        </a>';
        })

        ->rawColumns(['edit','delete'])
        ->addIndexColumn()
        ->make(true);
    }

    public function add_new()
    {
        return view('superadmin.models.products.add_new');
    }

    public function delete($id)
    {
        Product::deleteById($id);
        return self::response('success', 'Deleted!');
    }
}