<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Hotel API",
 *     description="Hotel API Documentation",
 *     @OA\Contact(
 *         email="diogo.coutinho.ads@gmail.com"
 *     )
 * ),
 * @OA\SecurityScheme(
 *      type="http",
 *      description="Laravel Sanctum Token",
 *      name="Authorization",
 *      in="header",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 *      securityScheme="bearerAuth"
 *  )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
