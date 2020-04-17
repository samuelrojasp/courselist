<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait RESTActions {


    public function all()
    {
        $m = self::MODEL;
        return $this->respond(Response::HTTP_OK, $m::paginate(10));
    }

    public function list()
    {
        $m = self::MODEL;
        return $this->respond(Response::HTTP_OK, $m::all());
    }

    public function get($id)
    {
        $m = self::MODEL;
        $model = $m::find($id);
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function add(Request $request)
    {
        $m = self::MODEL;

        $this->validate($request, $m::$postRules, $m::$customMessages);
        return $this->respond(Response::HTTP_CREATED, $m::create($request->json()->all()));
    }

    public function put(Request $request, $id)
    {
        $m = self::MODEL;

        $this->validate($request, $m::$putRules, $m::$customMessages);
        $model = $m::find($id);

        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $model->update($request->json()->all());
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function remove($id)
    {
        $m = self::MODEL;
        if(is_null($m::find($id))){
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $m::destroy($id);
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

}
© 2020 GitHub, Inc.