<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = [
            ["name" => "Alfa"],
            ["name" => "Frien"],
            ["name" => "Mikasa"],
            ["name" => "Eren"]
        ];

        return view('admin.dashboard', [
            'persons' => $persons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;

        return  "Create data $name";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $name = $id;

        return view('admin.crud.edit', ['name' => $name]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;

        return  "Update data $name";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $name = $id;

        return  "Deleted data $name";
    }


    public function settings() {
        return view('admin.settings');
    }

    public function profile() {
        return view('admin.profile');
    }
}
