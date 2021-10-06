<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function add_posts(Request $req)
	{
		$new_post = new Post;
		
		//Если не хватает передаваемого параметра выдаем ошибку
		if (!isset($_POST['message']) ||  !isset($_POST['token']))
			{
				$arr = array('error' => 'Invalid request');
				return json_encode($arr);
			}			
		 //Иначе принимаем сообщение и токен
		 $message =  $_POST['message'];//Принимаем сообщение
         $token = $_POST['token'];//Принимаем токен 
				
		

        //Ищем в базе полученный токен		
		$user = DB::table('users')->where('token', $token)->first();
		//Если токен не нашли
		if (!isset($user))
		{
			$arr = array('error' => 'token not found','token' => $token );
			return json_encode($arr);
		}
		
		//Есди токен найден добавляем высказывание
		$new_post -> user_id = $user->id; 
		$new_post -> message = $message;
		$new_post -> save();
		$arr = array('id=' => $new_post->id, 'Name' => $user->name, 'message' => $message);
		return json_encode($arr);
		//$new_post -> 
		
		//$req->session('auth', '1');

		//Прямая связь
		
		//$User = User::find(1);
		//dd($User->post[0]->message);
		
		
		//Обратная связб
		//$Post = Post::find(1);
		//dd($Post->user->name);
		
		//return 1;
	}
	
	

	
	
	
	//Ищем определенный пост
	public function post(Request $req, $id)
	{
		//Ищем пост 
		$post = Post::find($id);
		if (!isset($post)) 
		{//Если не существует поста с таким id
			$arr = array('id=' => $id, 'error' => 'id not find');
		   return json_encode($arr);
		}
		//Если нашли то выводим
		$arr = array('id=' => $id, 'author' =>$post->user->name, 'message'=>$post->message);
		return json_encode($arr);
		//echo $post -> message;
		//echo $id;
		//$all_post = DB::table('Posts')->get();
		//echo $all_post;//dd($all_post);
	}
	 
	 
	 
	 
    public function index()
    {
        //
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
	 	//Показываем все посты 
	public function all_posts(Request $req)
	{
		$all_post = DB::table('Posts')->get();
		echo $all_post;//dd($all_post); 
	}
	
	 
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
