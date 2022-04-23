<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Retorna todos os dispositivos
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllDevices(Request $request)
    {
        $devices = Auth::user()->devices;
        return response()->json(['result' => $devices]);
    }

    /**
     * Retorna um dispositivo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDevice($id)
    {
        return response()->json(Device::find($id));
    }

    /**
     * Cria um novo dispositivo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDevice(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'ip' => 'required',
            'user_id' => 'required',
            'ikev2' => 'required',
            'user' => 'required',
            'password' => 'required',
        ]);
        if (Auth::user()) {
            $device = Device::create($request->all());
            return response()->json($device, 201);
        }
    }

    /**
     * Atualiza um dispositivo
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDevice(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->update($request->all());
        return response()->json($device, 200);
    }

    /**
     * Deleta um dispositivo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDevice($id)
    {
        Device::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
