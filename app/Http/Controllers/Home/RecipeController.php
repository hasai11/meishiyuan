<?php

namespace App\Http\Controllers\Home;

use App\Model\Book_Food;
use App\Model\Book_Step;
use App\Model\Home\Cate;
use App\Model\Recipe;
use App\Model\User;
use Image;
use Session;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class RecipeController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $cates = Cate::get();
        $cates = $this->getTree($cates,0);
        $user = User::with('Details')->where('id',Session::get('user')->id)->first();
        //创建菜谱页面
        return view('home.recipe.create',['user'=>$user,'cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.获取数据
        $input = $request->except('_token','food','dosage','step');

        //2.验证
        $validator = Validator::make($input, [
            'cid'=>'required',
            'title'=>'required',
            'content'=>'required',
            'pic'=>'required',
        ], [
            'cid.required'=>'菜谱分类必须选择一个',
            'title.required'=>'菜谱标题不能为空',
            'pic.required'=>'请上传一张菜谱封面',
            'content.required'=>'请输入菜谱描述'
        ]);

        if ($validator->fails()) {
            $request->session()->reflash();
            return redirect('/recipe/create')
                ->withErrors($validator)
                ->withInput();
        }

        //3.上传图片
        if ($request->hasFile('pic')){
            $file = $request->pic;
            $name = date('YmdHis').rand(1000,9999).'.jpg';
            $path = public_path().'/home/recipe/upload/'.$name;
            Image::make($file)->resize(660,490)->save($path);
        }

        //4.添加其余字段数据
        $input['uid'] = (Session::get('user')['id']);
        $input['pic'] = $name;

        //5.保存数据
        $res = Recipe::create($input);

        //6.获取刚刚插入数据库的菜谱ID
        $id = $res->id;

        $input = $request->except('_token','title','pic','content','cid','tip','step');

        //7.添加食材表数据
        $input['bid'] = $id;
        $input['food'] = json_encode($input['food']);
        $input['dosage'] = json_encode($input['dosage']);
        $res1 = Book_Food::create($input);


        $input = $request->except('_token','title','pic','content','cid','tip','food','dosage');
        //8.添加步骤表数据
        $input['bid'] = $id;
        $input['step'] = json_encode($input['step']);
        $res2 = Book_Step::create($input);

        if ($res&&$res1&&$res2){
            //9.添加成功，跳转
            return redirect('/recipe/'.$id);
        }else{
            return redirect('/recipe/create')->with('errors','添加菜谱失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::with('Book_Food')->with('Book_Step')->where('id',$id)->first();
        if($recipe){
            $food = [];
            $dosage = [];
            $step = [];
            foreach ($recipe->Book_Food as $v){
                $food = json_decode($v->food);
                $dosage = json_decode($v->dosage);
            }
            foreach ($recipe->Book_Step as $v){
                $step = json_decode($v->step);
            }

            $user = User::with('Details')->where('id',$recipe->uid)->first();
            //菜谱详情页面
            return view('home.recipe.show',['recipe'=>$recipe,'user'=>$user,'food'=>$food,'dosage'=>$dosage,'step'=>$step]);
        }
       return;
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
