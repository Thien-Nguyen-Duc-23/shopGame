<?php

namespace App\Http\Controllers\Admin;

use App\Factories\AdminFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibraryController extends Controller
{

    protected $library;

    public function __construct()
    {
        $this->library = AdminFactory::libraryRepository();
    }

    public function loadLibrary(Request $request)
    {
        return response()->json( $this->library->loadLibrarybyUser($request->all()) );
    }

    public function updateLoadFile(Request $request)
    {
        return response()->json( $this->library->updateLoadFile($request->all()) );
    }


}
