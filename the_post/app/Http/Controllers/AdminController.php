<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequest = User::where('is_admin' , NULL)->get();
        $revisorRequest = User::where('is_revisor' , NULL)->get();
        $writerRequest = User::where('is_writer' , NULL)->get();

        return view('admin.dashboard' , compact('adminRequest', 'revisorRequest', 'writerRequest'));
    }
    public function setAdmin(User $user){
        $user->is_admin = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente reso amministratore l'utente scelto");
    }
    public function unsetAdmin(User $user){
        $user->is_admin = false;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente tolto il ruolo di amministratore l'utente scelto");
    }
    public function setRevisor(User $user){
        $user->is_revisor = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente reso revisore l'utente scelto");
    }
    public function unsetRevisor(User $user){
        $user->is_revisor = false;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente tolto il ruolo di revisore all'utente scelto");
    }
    public function setWriter(User $user){
        $user->is_writer = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente reso redattore l'utente scelto");
    }
    public function unsetWriter(User $user){
        $user->is_writer = false;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "Hai correttamente tolto il ruolo di redattore all'utente scelto");
    }
    public function editTag(Request $request, Tag $tag){
        $request->validate([
            'name'=>'required|unique:tags',
        ]);
        $tag->update([
            'name'=> strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato il tag');
    }
    public function deleteTag(Tag $tag){
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }
        $tag->delete();
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente eliminato il tag');
    }
    public function editCategory(Request $request, Category $category){
        $request->validate([
            'name'=>'required|unique:categories',
        ]);
        $category->update([
            'name'=> Str::title($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente aggiornato la categoria');
    }
    public function deleteCategory(Category $category){
        $category->delete();
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente eliminato la categoria');
    }
    public function storeCategory(Request $request){
        Category::create([
            'name' => Str::title($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente inserito una nuova categoria');
    }
}
