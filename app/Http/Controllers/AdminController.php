<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Product;
use App\Models\Message;
use App\Models\Announcement;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $userCount = User::count();
        $productCount = Product::count();
        $announcementCount = Announcement::count();
        $announcements = Announcement::latest()->take(3)->get();
        $messages = Message::where('to_user_id', Auth::id())
            ->orWhere('from_user_id', Auth::id())
            ->latest()
            ->get()
            ->groupBy(function ($message) {
                return $message->from_user_id == Auth::id() ? $message->to_user_id : $message->from_user_id;
            });

        // Her bir kullanıcı için görülmeyen mesaj sayısını hesapla
        $totalUnseenMessageCount = Message::where('to_user_id', Auth::id())
        ->where('is_read', false)
        ->count();


        return view('admin.index', compact('userCount', 'productCount', 'announcementCount', 'announcements', 'totalUnseenMessageCount','messages'));
    }
    public function listUsers(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function addUser(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);

        User::factory()->create($data);
        
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function delete(User $user)
    {
        $user->delete();
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $users = User::where('name', 'like', "%$searchTerm%")->with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    // Product Methods
    public function listProducts()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'like', "%$searchTerm%")
                                    ->get();
        return view('admin.products.index', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.products.create');
    }

    public function storeProduct(Request $request)
    {
        $data = $request->only(['name', 'description', 'price', 'stock', 'imageurl']);
        Product::create($data);
        return redirect()->route('admin.products');
    }

    public function editProduct(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $data = $request->only(['name', 'description', 'price', 'imageurl']);
        $product->update($data);
        return redirect()->route('admin.products');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products');
    }

    //Duyuru işlemleri
    public function listAnnouncements()
    {
        $announcements = Announcement::all();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function searchAnnouncements(Request $request)
    {
        $searchTerm = $request->input('search');
        $announcements = Announcement::where('title', 'like', "%$searchTerm%")
                                    ->orWhere('content', 'like', "%$searchTerm%")
                                    ->get();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function createAnnouncement()
    {
        return view('admin.announcements.create');
    }

    public function storeAnnouncement(Request $request)
    {
        $data = $request->only(['title', 'content']);
        Announcement::create($data);
        return redirect()->route('admin.announcements');
    }

    public function editAnnouncement(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function updateAnnouncement(Request $request, Announcement $announcement)
    {
        $data = $request->only(['title', 'content']);
        $announcement->update($data);
        return redirect()->route('admin.announcements');
    }

    public function deleteAnnouncement(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.announcements');
    }
}
