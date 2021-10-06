<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class enterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	  public function chek(Request $req)
    {
      $mail= $_POST['email'];
      $password= $_POST['password'];
	  
	   if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, 'http://127.0.0.1/api/authorization');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "Email=".$mail."&name=kirill&Password=".$password);
    $out = curl_exec($curl);
	$obj = json_decode($out);
   
	if (isset($obj->{'token'}))
		{
			$token = $obj->{'token'};
			
			$_session['token'] = $token;
			//echo "Token:".$_session['token'];
		
		}
	 else   echo $obj->{'error'};
	
    curl_close($curl);
	
	return view('enter', ['name' => $_session['token']]);
  }
	  
    }
	  public function list(Request $req){
		  echo "test";
		 return view('list', ['name' => "lo"]); 
	  }
	
	
	public function start(Request $req)
	{
		if (isset($_session['token']))
		echo $_session['token'];
		return view('enter', ['name' => 'kirill']);
	}
	 
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
