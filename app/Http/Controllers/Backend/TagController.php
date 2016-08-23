<?php

namespace App\Http\Controllers\Backend;

use Session;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Requests\TagCreateRequest;

class TagController extends Controller
{
    protected $fields = [
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '',
        'layout' => 'frontend.blog.index',
        'reverse_direction' => 0,
        'created_at' => '',
        'updated_at' => '',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Tag::all();

        return view('backend.tag.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [];

        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('backend.tag.create', compact('data'));
    }

    /**
     * Store the newly created tag in the database.
     *
     * @param TagCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagCreateRequest $request)
    {
        $tag = new Tag();
        $tag->fill($request->toArray())->save();
        $tag->save();

        Session::set('_new-tag', trans('messages.create_success', ['entity' => 'tag']));

        return redirect('/admin/tag');
    }

    /**
     * Show the form for editing a tag.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $tag->$field);
        }

        return view('backend.tag.edit', compact('data'));
    }

    /**
     * Update the tag in storage.
     *
     * @param TagUpdateRequest $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TagUpdateRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->fill($request->toArray())->save();
        $tag->save();

        Session::set('_update-tag', trans('messages.update_success', ['entity' => 'Tag']));

        return redirect("/admin/tag/$id/edit");
    }

    /**
     * Delete the tag.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        Session::set('_delete-tag', trans('messages.delete_success', ['entity' => 'Tag']));

        return redirect('/admin/tag');
    }
}
