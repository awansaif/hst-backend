<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.pages.member.index', [
            'members' => Member::orderBy('name', 'ASC')->get()
        ]);
    }


    public function create()
    {
        return view('admin.pages.member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'avatar_path' => 'required|image',
        ]);

        Member::create([
            'name' => $request->name,
            'avatar_path' => $request->avatar_path->store('images', 'public'),
        ]);

        return back()
            ->with('message', 'Member added successfully');
    }

    public function show(Member $member)
    {
        //
    }

    public function edit(Member $member)
    {
        return view('admin.pages.member.edit', [
            'member' => $member
        ]);
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string',
            'avatar_path' => 'nullable|image',
        ]);

        $member->update([
            'name' => $request->name,
            'avatar_path' => $request->file('avatar_path') ?  $request->avatar_path->store('images', 'public') : $member->avatar_path,
        ]);

        return back()
            ->with('message', 'Member Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
