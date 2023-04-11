<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateFormRequest;
use App\Http\Services\User\UserService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        return view('admin.users.add', [
            'title' => 'Thêm user Mới',
            'users' => $this->userService->getUser()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->userService->create($request);

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $data = $request->all();
        return view('admin.users.list', [
            'title' => 'Danh Sách user Mới Nhất',
            'users' => User::whereNot('role_id', '0')->search($data)->paginate(10),
            'data' => $data
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $user->name,
            'user' => $user,
            'users' => $this->userService->getUser()
        ]);
    }

    public function update(User $user, CreateFormRequest $request)
    {
        $this->userService->update($request, $user);

        return redirect('/admin/users/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->userService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công người dùng'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
