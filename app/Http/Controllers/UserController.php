<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

use Session;

class UserController extends Controller
{
	
	private function check($name,$email)
	{
	  //Проверяем есть ли в базе пользователь с таким именем 
	   if (DB::table('users')->where('name', $name)->first()) 
		{ 
            echo "a user with this name exists<br>";	
			return 0;
		}
		
	    //Проверяем есть ли в базе пользователь с таким емайлом	
	   if (DB::table('users')->where('email', $email)->first())
		{
			echo "user with this email exists<br>";	
		    return 0;
		} 

		  return 1; //Если такого пользователя еще нет возвращаем 1
	}
	
	
	
	
	
	
	
	public function authorization(Request $request)
	{
		
		$_email = $_POST['Email']; //Принимаем данные (логин и пароль)
		$_password = md5($_POST['Password']);

        //Проверяем совпадения в базе данных и запоминаем если есть, что бы добавить токен входа
   		if ($_id=DB::table('users')->where('Email', $_email)->first() and 
		   $_id->password==$_password)
		   {
			    $token = md5($_id->email);//Генерируем токен из имени и емайла
			    $User =DB::table('users')->where('id',$_id->id)->update(['token' => $token]);//Обновляем токен в базе
				$arr = array('auth' => 1,'id'=> $_id->id,'Name' => $_id->name, 'token' => $token );//Формируем JSON Ответ
	       } 
		   
		else $arr = array('error' => 'User in the database not found'); //Если не удалось найти 
    	return json_encode($arr); //Возвращаем JSON 
	}
	
	
	
	
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	//Регистрация нового пользователя 
    public function registration(Request $req)
    {
        $User = new User;
			$User -> name = $_POST['Name']; 
			$User -> email =$_POST['Email'];	
			$User -> token = '0';	
			$User -> password = md5($_POST['Password']);		

			//Проверяем перед сохранением
			if ($this->check($User -> name,$User -> email)) 
				$User -> save(); //Если такого пользователя нет то сохраняем
		     else return "has already"; //Иначе выдаем сообщение (и не сохранением)	
			 
		return $User->id; ////При удачном сохранении возвращаем id сохраненного пользователя
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
