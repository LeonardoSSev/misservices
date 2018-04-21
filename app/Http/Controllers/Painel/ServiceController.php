<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\User;

class ServiceController extends Controller
{
    private $numberPagination = 10;

    public function index()
    {
        $services = Service::paginate($this->numberPagination);;

        return view('painel.services.home', compact('services'));
    }

    public function createService(User $users)
    {
        $categories = Category::all();

        $users = $users->getNoAdminUsers();

        return view('painel.services.create', compact(['categories', 'users']));

    }

    public function storeService(Request $request)
    {
        $service = new Service;

        $service->name = $request->name;
        $service->description = $request->description;
        $service->user_id = $request->user;
        $service->category_id = $request->category;

        $service->save();

        return redirect()->route('admin.services');
    }

    public function editService($idService, User $users)
    {
        $service = Service::find($idService);
        $categories = Category::all();
        $users = $users->getNoAdminUsers();

        return view('painel.services.edit', compact(['service', 'categories', 'users']));
    }

    public function updateService(Request $request, $idService)
    {
        $service = Service::find($idService);

        $service->name = $request->name;
        $service->description = $request->description;

        $service->save();

        return redirect()->route('admin.services');
    }

    public function viewService($idService)
    {
        $service = Service::find($idService);

        return view('painel.services.view', compact('service'));
    }

    public function deleteService($idService)
    {
        Service::destroy($idService);

        return redirect()->route('admin.services');
    }
}
