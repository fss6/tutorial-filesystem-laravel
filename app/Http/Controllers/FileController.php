<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;


class FileController extends Controller
{	

	public function index() 
	{

		$files = Storage::disk('local')->files("/");

		return view('tutorial', compact('files'));
	}

	public function store(Request $request) 
	{	

		$file = $request->file('file');
		Storage::disk('local')->put($file->getClientOriginalName(), File::get($file));

		return redirect('files');
	}

	public function destroy($fileName) 
	{	
		if(Storage::disk('local')->exists($fileName)) {
			Storage::disk('local')->delete($fileName);
		}

		return redirect('files');
	}

	public function show($fileName)
	{
		$file = Storage::disk('local')->get($fileName); 

		return (new Response($file, 200))->header('Content-Type', "");
	}
 
}
