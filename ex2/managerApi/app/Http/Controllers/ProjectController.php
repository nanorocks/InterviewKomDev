<?php

namespace App\Http\Controllers;

use App\Http\Resources\Projects\CollectionProjectResource;
use App\Http\Resources\Projects\SingleProjectResource;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store()
    {
        // TODO add project to database by user
        return new SingleProjectResource();
    }

    public function paginate()
    {
        // TODO list projects with todos by specific user and paginate
        return new CollectionProjectResource();
    }

}
