<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getProducts(Request $request)
    {
        $query = $request->input('QueryString', ''); // Get query string or default to empty
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(6);
        return response()->json($products);
    }
    
    public function getOrders()
    {
        $orders = Order::all();
        return response()->json($orders);
    }
    public function getUsers(Request $request)
{
    $search = $request->input('search', '');    
    $users = User::where('name', 'like', '%' . $search . '%')->paginate(6);
    return response()->json($users);
}

    public function addProduct(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'price' => 'required|numeric|min:0|min:3', // Ensure `price` is a number
            'active' => 'required|boolean', // Ensure `active` is a boolean
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gender' => 'required|string',
        ]);
    
        // Create a new product
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->active = $request->input('active');
        $product->description = $request->input('description');
        $product->gender = $request->input('gender');
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public/images'); // Store the image and get the path
            $product->image = $path;
        }
    
        $product->save();
        return response()->json($product);
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
    public function updateProduct(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'price' => 'required|numeric|min:0', // Ensure `price` is a number
            'active' => 'required|boolean', // Ensure `active` is a boolean
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048' // Validate image
        ]);
    
        // Find the product by ID
        $product = Product::findOrFail($id);
    
        // If a new image is uploaded, handle the upload
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');
    
            // Define the file path and name
            $imagePath = $image->store('public/products'); // Store the image in the `public/products` directory
    
            // Delete the old image if exists
        
            // Update the product's image path
            $product->image = $imagePath;
        }
    
        // Update the other product details
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->active = $request->input('active');
        $product->description = $request->input('description');
        $product->gender = $request->input('gender'); // Assuming you have a gender field
    
        // Save the updated product details
        $product->save();
    
        // Return response or redirect
        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product
        ]);
    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
    public function editUser(Request $request, $id){
        try {
            $request->validate([ 
                'name' => 'required|string|min:3',
                'email' => 'required|email',
                'is_admin' => 'required|boolean'
            ]);
    
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->is_admin = $request->is_admin;
            $user->save();
    
            return response()->json(['message' => 'User updated successfully']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating user'], 500);
        }
    }

    public function getNotif(){
        $notifications = DB::table('notifications')
        ->orderBy('created_at', 'desc') // Sort notifications by creation time
        // Limit to the most recent 8 notifications
        ->get();
        return response()->json($notifications);
    }
    public function deleteNotif($id){
       try{
        $result =  DB::table('notifications')->where('id', $id)->delete();
        return response()->json(['message' => 'Notification deleted successfully']);
    }catch(\Exception $e){
        return response()->json(['message' => 'Error deleting notification'], 500);
    }}

    public function getOrdersP(){
        $orders = Order::orderBy('created_at', 'desc')->get();        $res = [];
        foreach($orders as $order){
            $order->products = $order->products;
            $res[] = $order;
        }
        return response()->json($res);
    }
  
    
    public function confirmShipp(Request $request, $id)
    {
        $order = Order::where('id',$id)->first();
    
        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }
    
        $order->shipped_at = $request->input('shipped_at');
        $order->save();
    
        return response()->json(['message' => 'Order updated successfully.']);
    }
    
    
}
