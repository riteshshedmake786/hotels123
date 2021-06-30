<?php

namespace App\Http\Controllers;
use App\SupplierProfile;
use App\SupplierType;
use App\SupplierProducts;
use App\SupplierImageGallery;
use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($services)
    {
        
         $suppliertype = SupplierType::where('title',$services)->get();
         foreach($suppliertype as $key=>$value)
         {
             $var=$value->id;
             $title = $value->title;
         }
          $var;
          $supplierlist = SupplierProfile::where('services', '=', $var)->get();
        
        return view('supplierList',['data'=>$supplierlist, 'title'=>$title]);
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


    public function getSupplierProducts($id){
        
        $supplierimagegalary = SupplierImageGallery::where('supplier_id',$id)->get();
        $supplierdetail = SupplierProfile::where('id',$id)->get();
        $SupplierProducts = SupplierProducts::where('supplier_id',$id)->get();

        foreach($SupplierProducts as $value){
            $image[]=explode(" ",$value->image);
        }
         $image =  call_user_func_array('array_merge', $image);
         foreach($supplierdetail as $key=>$value)
         {
             $var=$value->services;
         }
        $var;
        $suppliertype = SupplierType::where('id',$var)->get();
        
         foreach($suppliertype as $key=>$value)
         {
             $title=$value->title;
         }

        return view('supplierDetails',['data'=>$SupplierProducts,'detail'=>$supplierdetail,'supplierimage'=>$supplierimagegalary,'suppliertype'=>$title,'image'=>$image]);
    }
}
