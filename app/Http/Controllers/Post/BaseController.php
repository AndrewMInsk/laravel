<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Services\Post\Service;
use Illuminate\Foundation\Http\FormRequest;

class BaseController extends Controller
{
    public $service;
   // public $request;
    public function __construct(Service $service)
    {
        $this->service = $service;
    //    $this->service->request = $request;
    }

}
