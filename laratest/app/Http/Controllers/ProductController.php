<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$row = DB::select('select * from product');

        foreach ($row as $product){
            echo $product->productName;
        }*/

        $product = Product::all();

        /*return view('product.index', compact('product'));*/
        return view('product.index')->with('product', $product);
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
        if($request->hasFile('productPic')){
            //echo "has file";

            $imageFile = $request->file('productPic');

            $imageFile->move('upload', $imageFile->getClientOriginalName());

            $filePath = "upload/".$imageFile->getClientOriginalName();

            //echo $filePath;

            //DB::insert("insert into product ('productName', 'productPic', 'price') values (?, ?, ?)", [$request->productName], ["$filePath"], [$request->productPrice]);
            DB::insert("insert into product (productName, productPic, price) values ('$request->productName', '$filePath', '$request->productPrice')");
            return redirect('/productList');
        }

        //echo "hello";
    }

    public function delete($id){
        $row = DB::delete('delete from product where id = ?', [$id]);

        return redirect('/productList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

    }

    public function modify($id){
        //echo $id;
        $product = Product::find($id);

        //print_r($product);
        //echo "<img src='$product->productPic' width='200px' height='100px'>";
        return view('product.edit')->with('product', $product);
    }

    public function updateProduct(Request $request, $id){
        /*$product = Product::find($id);

        $product->productName = $request->productName;
        $product->price = $request->productPrice;

        if($request->hasFile('updateProductPic')){
            //echo "yes";
            $imageFile = $request->file('updateProductPic');

            $imageFile->move('upload', $imageFile->getClientOriginalName());

            $filePath = "upload/".$imageFile->getClientOriginalName();
            $product->productPic = $filePath;

            $product->save();

            return redirect('/productList');
        }
        else{
            $product->save();
            //do nothing...
            return redirect('/productList');
            //echo "no";
        }*/

        if($request->hasFile('updateProductPic')){
            //echo "yes";
            $imageFile = $request->file('updateProductPic');

            $imageFile->move('upload', $imageFile->getClientOriginalName());

            $filePath = "upload/".$imageFile->getClientOriginalName();

            DB::update("update product set productName='$request->productName', price='$request->productPrice', productPic='$filePath' where id='$id'");

            return redirect('/productList');
        }
        else{
            DB::update("update product set productName='$request->productName', price='$request->productPrice' where id='$id'");

            return redirect('/productList');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
    }
}
