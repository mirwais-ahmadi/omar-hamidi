<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->orderBy('name')->get();

        return view('admin.users.index', [
            'admins' => $users->where('role', User::ROLE_ADMIN)->values(),
            'siteManagers' => $users->where('role', User::ROLE_SITE_MANAGER)->values(),
        ]);
    }

    public function create(): View
    {
        return view('admin.users.form', [
            'user' => new User(['role' => User::ROLE_SITE_MANAGER]),
            'mode' => 'create',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateUser($request);

        User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'کاربر جدید با موفقیت ایجاد شد.');
    }

    public function edit(User $user): View
    {
        return view('admin.users.form', [
            'user' => $user,
            'mode' => 'edit',
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $this->validateUser($request, $user);

        $payload = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];

        if (! empty($validated['password'])) {
            $payload['password'] = $validated['password'];
        }

        // Prevent demoting/removing the last admin
        if (
            $user->isAdmin()
            && $validated['role'] !== User::ROLE_ADMIN
            && User::query()->where('role', User::ROLE_ADMIN)->where('id', '!=', $user->id)->count() === 0
        ) {
            return back()
                ->withInput()
                ->withErrors(['role' => 'حداقل یک مدیر کاربران باید در سیستم باقی بماند.']);
        }

        $user->update($payload);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'اطلاعات کاربر ذخیره شد.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($request->user()->id === $user->id) {
            return back()->withErrors(['user' => 'نمی‌توانید حساب خودتان را حذف کنید.']);
        }

        if (
            $user->isAdmin()
            && User::query()->where('role', User::ROLE_ADMIN)->where('id', '!=', $user->id)->count() === 0
        ) {
            return back()->withErrors(['user' => 'حداقل یک مدیر کاربران باید باقی بماند.']);
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'کاربر حذف شد.');
    }

    /**
     * @return array{name: string, email: string, role: string, password?: string}
     */
    private function validateUser(Request $request, ?User $user = null): array
    {
        $passwordRules = $user
            ? ['nullable', 'string', 'min:8', 'confirmed']
            : ['required', 'string', 'min:8', 'confirmed'];

        return $request->validate(
            [
                'name' => ['required', 'string', 'max:120'],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($user?->id),
                ],
                'role' => ['required', Rule::in(User::ROLES)],
                'password' => $passwordRules,
            ],
            [],
            [
                'name' => 'نام',
                'email' => 'ایمیل',
                'password' => 'رمز عبور',
                'role' => 'نقش کاربر',
            ]
        );
    }
}
