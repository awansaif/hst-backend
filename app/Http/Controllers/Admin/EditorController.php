<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{

    public function index()
    {
        return view('admin.pages.editor.index');
    }

    public function create()
    {
        return view('admin.pages.editor.create');
    }

    public function edit(Editor $editor)
    {
        return view('admin.pages.editor.edit', ['editor' => $editor]);
    }
}
