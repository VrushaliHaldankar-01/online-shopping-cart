<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\product_details;

class ProductController extends Controller
{   public function home()
    {
        return view('welcome');    
    }
    public function index()
    {
        $product_details=product_details::all();
    
    return view('product_details',[
        'product_details'=>$product_details,
        ]);

    }
    public function cart()
    {
        return view('cart');    
    }
    public function addtocart(product_details $products)
    {
   
       
         $cart=session()->get('cart');
         if(!$cart)
         {
             $cart=[
                $products->id=>[
                    'name'=>$products->name,
                    'quantity'=>1,
                    'price'=>$products->price
                
                            ]
                   ];
         session()->put('cart',$cart);
         return redirect()->route('cart')->with('success','added');
         }

        if(isset($cart[$products->id]))
            {
                $cart[$products->id]['quantity']++;
                session()->put('cart',$cart);
             
                return redirect()->route('cart')->with('success','added');

             }

             
         $cart[$products->id] = [
                'name' => $products->name,
                'quantity' => 1,
                'price' => $products->price
               
            ];
            session()->put('cart', $cart);
            return redirect()->route('cart')->with('success','added');
          
    }
          
       
            public function decrease($id)
            {
              
              
                $cart=session()->get('cart');
                if(isset($cart[$id]))
                {
                    $cart[$id]['quantity']--;
                    session()->put('cart',$cart);
                
                    return redirect()->route('cart')->with('success','added');
                }
                 
    
            }
              public function increase($id)
              {
              
              
                $cart=session()->get('cart');
                if(isset($cart[$id]))
                {
                    $cart[$id]['quantity']++;
                    session()->put('cart',$cart);
                
                 
                    return redirect()->route('cart')->with('success','added');
                }
                 

              }
          
          public function destroy($id)
          {

            $cart=session()->get('cart');
            if(isset($cart[$id]))
                {
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                }
                return redirect()->back()->with('success','Removed');
           
          }
          public function checkout()
            {
                return view('checkout');    
            }   
     
          
}
