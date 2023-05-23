<?php

namespace App\Http\Controllers;

use App\Helpers\formatAPI;
use App\Models\Siswa;
use Exception;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();
            
        if($data) {
            return formatAPI::createAPI(200, 'Success', $data);
        } else {
            return formatAPI::createAPI(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //for creating data in db
            $siswa = Siswa::create($request->all());

            //get data siswa where id_siswa = id_siswa
            $data = Siswa::where('id_siswa', '=', $siswa->id_siswa)->GET();

            //check data is valid? return data : failed
            if($data) {
                return formatAPI::createAPI(200, 'Success', $data);
            } else {
                return formatAPI::createAPI(400, 'Failed');
            }

        } catch (Exception $error) {
            return formatAPI::createAPI(400, 'Failed', $error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_siswa)
    {
        try {
            $data = Siswa::where('id_siswa', '=', $id_siswa)->first();

            if($data) {
                return formatAPI::createAPI(200, 'Success', $data);
            } else {
                return formatAPI::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return formatAPI::createAPI(400, 'False', $error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_siswa)
    {
        try {
            $siswa = Siswa::findorfail($id_siswa);
            $siswa->update($request->all());

            $data = Siswa::where('id', '=', $siswa->id)->get();

            if($data) {
                return formatAPI::createAPI(200, 'Success', $data);
            } else {
                return formatAPI::createAPI(400, 'Failed');
            }

        } catch (Exception $error) {
            return formatAPI::createAPI(400, 'Failed', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_siswa)
    {
        try {
            $siswa = Siswa::findorfail($id_siswa);

            $data = $siswa->delete();

            if($data) {
                return formatAPI::createAPI(200, 'Success', $data);
            } else {
                return formatAPI::createAPI(400, 'Failed');
            }

        } catch (Exception $error) {
            return formatAPI::createAPI(400, 'Failed', $error);
        }
    }
}
