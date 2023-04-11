<?php


namespace App\Http\Services\User;


use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function create($request)
    {
        try {
            #$request->except('_token');
            User::create($request->all()
            );
            Session::flash('success', 'Thêm User mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm User LỖI');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function getUser()
    {
        return User::whereNot('role_id', 0)->get();
    }

    public function update($request, $user)
    {
        try {
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }
    public function destroy($request)
    {
        $User = User::where('id', $request->input('id'))->first();
        if ($User) {
            // $path = str_replace('storage', 'public', $User->thumb);
            // Storage::delete($path);
            $User->delete();
            return true;
        }

        return false;
    }

    public function show()
    {
        return User::orderByDesc('sort_by')->get();
    }
}
