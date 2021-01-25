<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostCategory;
use App\Http\Requests\StorePostCategory;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateStorePostCategory;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PostCategoryController extends Controller
{
    public function index()
    {
        $postCategories = PostCategory::all();
        return view('admin.post_categories.index', compact('postCategories'));
    }

    public function create()
    {
        return view('admin.post_categories.create');
    }

    public function store(StorePostCategory $request)
    {
        $data = request()->all();
        $data['slug'] = Str::slug($request->title);
        if (PostCategory::create($data)) {
            Alert::success('Thành công!');
        } else {
            Alert::error('Thất bại!');
        }
        return redirect()->route('admin.post_category.index');

    }

    public function edit(Request $request, PostCategory $postCategory)
    {
        return view('admin.post_categories.edit', compact('postCategory'));
    }

    public function update(UpdateStorePostCategory $request, PostCategory $postCategory)
    {
        $data = request()->all();
        $data['slug'] = Str::slug($request->title);
        if ($postCategory->update($data)) {
            Alert::success('Thành công!');
        } else {
            Alert::error('Thất bại!');
        }
        return redirect()->route('admin.post_category.index');
    }

    public function destroy(PostCategory $postCategory)
    {
        if ($postCategory->delete()) {
            Alert::success('Thành công!');
        } else {
            Alert::error('Thất bại!');
        }
        return redirect()->route('admin.post_category.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $postCategory = PostCategory::where('title', 'like', '%' . '$search' . '%')
            ->orderWhere('description', 'like', '%' . $search . '%')
            ->orderWhere('status', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('admin.postCategory.list', compact('postCategory'));
    }
}
