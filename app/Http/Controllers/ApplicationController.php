<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::filter()->paginate(10);
        return view('applications', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'url' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
        }

        Application::create([
            'name' => $request->name,
            'type' => $request->type,
            'url' => $request->url,
            'logo' => $request->logo ? $base64 : null,
        ]);

        return redirect()->route('applications.index')->with('success', 'Application added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        return view('applications-edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'url' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
        }

        $application->update([
            'name' => $request->name,
            'type' => $request->type,
            'url' => $request->url,
            'logo' => $request->logo ? $base64 : $application->logo,
        ]);

        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
