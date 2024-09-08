<?php 
    namespace App\Repositories;

use App\Models\Product;
use PhpParser\Node\Stmt\Return_;

    class CartRepository {
        public function total()
        {
            return \Cart::session(auth()->user()->id)->getTotal();
        }
        public  function getJsonItems(){
            return $this->content()->map(function($item){
                return [
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $item->quantity
                ];
            })->toJson();
        }
        public function add(Product $product)
        {
            \Cart::session(auth()->user()->id)->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => [],
                'associatedModel' => $product
            ]);
            return $this->count();
        }
        
        public function content()
        {
            return \Cart::session(auth()->user()->id)->getContent();
        }
        
        public function count() 
        {
            return $this->content()->sum('quantity');
        }
        public function increase($id){
            \Cart::session(auth()->user()->id)->update(
                $id,[
                    'quantity' =>  +1
                ]
            );
        }
        public function clear (){
            \Cart::session(auth()->user()->id)->clear();
        }
        public function decrease($id){
            $item = \Cart::session(auth()->user()->id)->get($id);
            if($item->quantity === 1){
                $this->remove($id);
                return;
            }


            \Cart::session(auth()->user()->id)->update(
                $id,[
                    'quantity' =>  -1
                ]
            );
        }
        public function remove($id){
            \Cart::session(auth()->user()->id)->remove($id);
        }
        
    }