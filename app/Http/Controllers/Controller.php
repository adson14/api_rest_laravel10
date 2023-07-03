<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Expenses Manage Api Documentation",
 *     description="API documentation for expense management",
 *     @OA\Contact(
 *         name="Adson Souza",
 *         email="test@teste.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * ),
 */


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
