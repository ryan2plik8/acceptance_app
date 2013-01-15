<?php

class UploadController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//the default view for the upload screen
		return View::make('upload')->with('status');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$s3 = new AmazonS3();

		$filename = Input::file('pdf')->getClientOriginalName();
		$upload = Upload::create(array('filename' => $filename));
		Input::file('pdf')->move('uploads', $filename);

		$s3->batch()->create_object('acceptancequote', $filename, array(
				'fileUpload' => 'uploads/'.$filename
			));

		$file_upload_response = $s3->batch()->send();
		print_r($file_upload_response);
		return View::make('upload')->with('status', 'File Uploaded!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}