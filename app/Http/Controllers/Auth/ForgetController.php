<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ForgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('front');
    }

    public function show()
    {
        return view('auth.forget');
    }

    public function store(Request $request)
    {
        $request->validate([
            'account' => ['required'],
            'code' => ['required', new VerificationCodeRule($request->account)],
            'password' => ['required', 'min:5', 'confirmed'],
        ]);

        if ($request->account != session('account')) {
            return response()->json(['message' => '帐号不存在'], 404);
        }

        $user = User::where($this->account(), $request->account)->firstOrFail();
        $user->password = $request->password;
        $user->save();
        Auth::login($user);
        return response()->json(['message' => '密码重置成功']);
    }

    public function code(Request $request, CodeService $codeService)
    {
        $account = $request->account;

        $request->validate([
            'captcha' => ['required', 'captcha'],
        ], ['code.required' => '图形验证码不能为空']);

        $hasUser = User::where('email', $account)->orWhere('mobile', $account)->exists();

        if (!$hasUser) {
            return response()->json(['message' => '帐号不存在'], 430);
        }

        $method = $this->account();
        $codeService->$method($account);

        session()->put('account', $account);

        return response()->json(['message' => '验证码发送成功']);
    }
}
