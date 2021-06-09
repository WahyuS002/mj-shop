<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::all();

        return view('public.user.address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.user.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
        $request->validated();

        $address = new Address();
        $address->user_id = auth()->user()->id;
        $address->title = $request->title;
        $address->full_name = $request->full_name;
        $address->phone_number = $request->phone_number;
        $address->address = $request->address;
        $address->notes = $request->notes;
        $address->save();

        if ($request->make_as_primary) {
            Address::where(['user_id' => auth()->user()->id, 'is_primary' => TRUE])->update(['is_primary' => FALSE]);
            $address->is_primary = TRUE;

            $address->save();
        }

        return redirect()
            ->to(route('profile.address.index'))
            ->withSuccess('Berhasil menambah data alamat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        if ($address->user_id != auth()->user()->id) {
            abort(404);
        }

        return view('public.user.address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        if ($address->user_id != auth()->user()->id) {
            abort(404);
        }

        return view('public.user.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAddressRequest $request, Address $address)
    {
        if ($address->user_id != auth()->user()->id) {
            abort(404);
        }

        $request->validated();

        $address->title = $request->title;
        $address->full_name = $request->full_name;
        $address->phone_number = $request->phone_number;
        $address->address = $request->address;
        $address->notes = $request->notes;
        $address->save();

        if ($request->make_as_primary) {
            Address::where(['user_id' => auth()->user()->id, 'is_primary' => TRUE])->update(['is_primary' => FALSE]);
            $address->is_primary = TRUE;

            $address->save();
        }

        return redirect()
            ->to(route('profile.address.show', $address->id))
            ->withSuccess('Berhasil memperbarui data alamat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        if ($address->user_id != auth()->user()->id) {
            abort(404);
        }

        $address->delete();

        return redirect()
            ->to(route('profile.address.index'))
            ->withSuccess('Berhasil menghapus alamat');
    }
}
