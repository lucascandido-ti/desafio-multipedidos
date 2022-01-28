<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Entries\UserEntries;
use App\Models\Services\UserServices;

class UserController extends BaseController
{

    /**
     * Lists all registered users in the database.
     * @link /users/list
     *
     * @param Request Empty.
     * @return json All users.
     */
    public function listUsers(Request $request){
        try {

            $service = new UserServices(new UserEntries($request));
            $service->listUsers();

            return response()->json($service->outputs)->setStatusCode(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Find user by id
     * @link /users/find/{id}
     *
     * @param Request {id:''}.
     * @return json User data.
     */
    public function findUser(Request $request){
        try {

            $service = new UserServices(new UserEntries($request));
            $service->findUser();

            return response()->json($service->outputs)->setStatusCode(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Insert a new user
     * @link /users/insert
     *
     * @param Request {email:'',password:''}.
     * @return json User data created.
     */
    public function insertUser(Request $request){
        try {

            $service = new UserServices(new UserEntries($request));
            $service->insertUser();

            return response()->json($service->outputs)->setStatusCode(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update user
     * @link /users/update
     *
     * @param Request {id:'', email:'',password:''}.
     * @return json User data updated.
     */
    public function updateUser(Request $request){
        try {

            $service = new UserServices(new UserEntries($request));
            $service->updateUser();

            return response()->json($service->outputs)->setStatusCode(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Delete user
     * @link /users/delete/{id}
     *
     * @param Request {id:''}.
     * @return json User data deleted.
     */
    public function deleteUser(Request $request){
        try {

            $service = new UserServices(new UserEntries($request));
            $service->deleteUser();

            return response()->json($service->outputs)->setStatusCode(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
