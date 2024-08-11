<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['last_name', 'first_name', 'gender', 'address', 'building', 'category_id', 'detail', 'tell', 'email']);
        $contact['tell'] = $request->tell_1 . $request->tell_2 . $request->tell_3;
        $contact['tell_1'] = $request->tell_1;
        $contact['tell_2'] = $request->tell_2;
        $contact['tell_3'] = $request->tell_3;
        $categories = Category::all();
        return view('confirm', compact('contact', 'categories'));
    }

    public function store(ContactRequest $request){
        $contact = $request->only(['last_name', 'first_name', 'gender', 'address', 'building', 'category_id', 'detail', 'tell', 'email']);
        $contact['tell'] = $request->tell_1 . $request->tell_2 . $request->tell_3;
        $categories = Category::all();
        Contact::create($contact);
        return view('thanks');
    }

    public function admin(){
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->DateSearch($request->created_at)->paginate(7); ;
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
    
    public function destroy(Request $request){
        Contact::find($request->id)->delete();
        return redirect('/admin')->with('message', 'Contactを削除しました');;

    }

}
