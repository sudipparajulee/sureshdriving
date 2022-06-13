<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    public function index()
    {
        $notices = Notice::orderby('priority')->get();
        return view('admin.notices.index',compact('notices'));
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'notice' => 'required',
            'priority' => 'required',
        ]);

        Notice::create($data);
        return redirect(route('notices.index'))->with('success','Notice Added Successfully');
    }

   
    public function edit(Notice $notice)
    {
        return view('admin.notices.edit',compact('notice'));
    }


    public function update(Request $request, Notice $notice)
    {
        $data = $request->validate([
            'notice' => 'required',
            'priority' => 'required',
        ]);

        $notice->notice = $data['notice'];
        $notice->priority = $data['priority'];
        $notice->save();
        return redirect(route('notices.index'))->with('success','Notice Updated Successfully');
    }

    
    public function destroy(Notice $notice)
    {
        //
    }

    public function delete(Request $request)
    {
        $notice = Notice::find($request->dataid);
        $notice->delete();
        return redirect(route('notices.index'))->with('success','Notice Deleted Successfully');
    }
}
