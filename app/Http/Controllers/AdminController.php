<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MOdels\User;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        // https://qiita.com/ryo2132/items/63ced19601b3fa30e6de
        //(compact()やwith()に関して)
        // 変数を一つ受け渡す場合はcompact関数又はwithメソッドで送信。
        // compactの方が可読性が高いのでそちらを使うことが多い。
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);// $filename がなかったのでとんでもない文字列で名前保存されていた。
            $data['profile_image'] = $filename;//これがないと写真名が当然保存されない
        }
        $data->save();
        return redirect()->route('admin.profile');
    }
}
