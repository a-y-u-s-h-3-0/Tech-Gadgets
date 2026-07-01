<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;

class VersionController extends Controller
{
    public function index()
    {
        $data = Version::paginate(5);
        return view('version.index', compact('data'));
    }

    public function create()
    {
        return view('version.create');
    }

    public function store(Request $request)
    {
        $table = new Version();
        $table->v_no = $request->v_no;
        $table->save();

        return redirect('version')->withSuccess("Inserted Successfully!!!");
    }

    public function edit(Version $version)
    {
        return view('version.edit', compact('version'));
    }

    public function update(Request $request, Version $version)
    {
        $version->v_no = $request->v_no;
        $version->save();

        return redirect('version')->withSuccess("Updated Successfully!!!");
    }

    public function destroy(Version $version)
    {
        $version->delete();
        return redirect('version')->withSuccess("Deleted Successfully!!!");
    }

    public function getVersion(Request $request)
    {
        $data = Version::where('_id', $request->_id)
        ->where('v_no', (double) $request->v_no)
        ->get();
    
        return [
            "status" => true,
            "message" => "Getting version details",
            "Version" => $data
        ];
    }
}
