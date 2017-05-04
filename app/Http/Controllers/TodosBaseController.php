<?php

namespace RogerFornerTodosBackend\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as IlluminateController;

/**
 * Class BaseController.
 *
 * @package RogerFornerTodosBackend\Http\Controllers
 */
class TodosBaseController extends IlluminateController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
