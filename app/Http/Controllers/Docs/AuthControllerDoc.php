<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthControllerDoc
{
    /**
     * @OA\Post(
     *     path="/auth/login",
     *     operationId="login",
     *     tags={"Auth"},
     *     summary="Login in api",
     *     @OA\Response(
     *      response="200",
     *      description="User Logged successfully",
     *      @OA\JsonContent(
     *        @OA\Property(property="data", type="object", example={"access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXV0aC9sb2dpbiIsImlhdCI6MTY4ODMxNTk2MCwiZXhwIjoxNjg4MzE5NTYwLCJuYmYiOjE2ODgzMTU5NjAsImp0aSI6ImRCcDVTRUtFd1I4VWUwbTIiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.vheK0S8gzTmCI1dq1aHvtjcUPUzIhPiIao2W-E3NPJE", "token_type": "bearer", "expires_in": "3600"})
     *      )
     *     ),
     *     @OA\Response(
     *        response="401",
     *        description="User or password incorret.",
     *        @OA\JsonContent(
     *            @OA\Property(property="msg", type="string",example="User or password incorret.")
     *        )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="password", type="string")
     *         )
     *     )
     * )
     */
    public function login()
    {
    }

    /**
     * @OA\Post(
     *     path="/auth/register",
     *     operationId="register",
     *     tags={"Auth"},
     *     summary="Create a new user",
     *     @OA\Response(
     *      response="201",
     *      description="User registered with success",
     *      @OA\JsonContent(
     *        @OA\Property(property="msg", type="string", example="User registered with success."),
     *        @OA\Property(property="data", type="object", example={"name": "Maik", "email": "maik@test.com", "updated_at": "2023-06-29T03:00:00.000000Z", "created_at": "2023-06-29T03:00:00.000000Z", "id": 200})
     *      )
     *     ),
     *     @OA\Response(
     *        response="400",
     *        description="Could not create user",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password","password_confirmation"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="password_confirmation", type="string")
     *         )
     *     )
     * )
     */
    public function register()
    {

    }


    /**
     * @OA\Post(
     *     path="/logout",
     *     tags={"Auth"},
     *     summary="Logout user",
     *     security={{"bearer_token": {}}},
     *     @OA\Response(response="200", description="User logged out successfully")
     * )
     */
    public function logout()
    {

    }
}
