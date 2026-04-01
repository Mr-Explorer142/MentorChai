<x-layout>
    <div class="min-h-screen flex items-center justify-center px-4 relative overflow-hidden"
        style="background-color: #f0f4f4;">

        {{-- Background Glow --}}
        <div class="absolute inset-0">
            <div class="absolute top-[-120px] left-[-120px] w-[400px] h-[400px] rounded-full"
                style="background: rgba(26,153,143,0.12); filter: blur(120px);"></div>
            <div class="absolute bottom-[-120px] right-[-120px] w-[400px] h-[400px] rounded-full"
                style="background: rgba(16,46,60,0.15); filter: blur(120px);"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full"
                style="background: rgba(24,127,135,0.06); filter: blur(100px);"></div>
        </div>

        <div class="relative w-full max-w-md">

            {{-- HEADER --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl shadow-xl mb-4 text-white"
                    style="background: linear-gradient(135deg, #102E3C, #1A998F);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                    </svg>
                </div>

                <h1 class="text-3xl font-bold tracking-tight" style="color: #102E3C;">Admin Panel</h1>
                <p class="text-sm mt-1" style="color: #155665; opacity: 0.7;">Secure admin login</p>
            </div>

            {{-- CARD --}}
            <div class="rounded-2xl shadow-2xl border"
                style="background: rgba(255,255,255,0.75); backdrop-filter: blur(20px); border-color: #C4CFCE;">

                <div class="p-8 space-y-6">

                    {{-- FORM --}}
                    <form method="POST" action="#" class="space-y-5">
                        @csrf

                        {{-- EMAIL --}}
                        <div class="form-control">
                            <label class="label pb-1">
                                <span class="text-xs font-semibold" style="color: #155665;">Admin Email</span>
                            </label>

                            <div class="relative">
                                <input type="email" name="email" placeholder="admin@email.com"
                                    class="input input-bordered w-full pl-10"
                                    style="border-color: #C4CFCE; background-color: #fafcfc; color: #102E3C;"
                                    onfocus="this.style.borderColor='#1A998F'; this.style.outline='none'; this.style.boxShadow='0 0 0 2px rgba(26,153,143,0.15)';"
                                    onblur="this.style.borderColor='#C4CFCE'; this.style.boxShadow='none';" required>

                                <span class="absolute left-3 top-1/2 -translate-y-1/2"
                                    style="color: #155665; opacity: 0.5;">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75" />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="form-control">
                            <label class="label pb-1">
                                <span class="text-xs font-semibold" style="color: #155665;">Password</span>
                            </label>

                            <div class="relative">
                                <input type="password" name="password" placeholder="••••••••"
                                    class="input input-bordered w-full pl-10"
                                    style="border-color: #C4CFCE; background-color: #fafcfc; color: #102E3C;"
                                    onfocus="this.style.borderColor='#1A998F'; this.style.outline='none'; this.style.boxShadow='0 0 0 2px rgba(26,153,143,0.15)';"
                                    onblur="this.style.borderColor='#C4CFCE'; this.style.boxShadow='none';" required>

                                <span class="absolute left-3 top-1/2 -translate-y-1/2"
                                    style="color: #155665; opacity: 0.5;">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 10.5h16.5v9.75H3.75z" />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        {{-- REMEMBER --}}
                        <div class="flex justify-between items-center text-sm">
                            <label class="flex items-center gap-2 cursor-pointer" style="color: #155665;">
                                <input type="checkbox" class="checkbox checkbox-sm"
                                    style="border-color: #1A998F; accent-color: #1A998F;">
                                Remember me
                            </label>
                        </div>

                        {{-- BUTTON --}}
                        <a href="{{ route('admin_dashboard') }}" type="submit"
                            class="btn w-full shadow-lg transition-all duration-200 text-white border-0 hover:opacity-90 hover:shadow-xl"
                            style="background: linear-gradient(135deg, #155665, #1A998F);">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                            Login as Admin
                        </a>

                    </form>

                    {{-- DIVIDER --}}
                    <div class="flex items-center gap-3">
                        <div class="flex-1 h-px" style="background-color: #C4CFCE;"></div>
                        <span class="text-xs" style="color: #155665; opacity: 0.6;">or</span>
                        <div class="flex-1 h-px" style="background-color: #C4CFCE;"></div>
                    </div>

                    {{-- BACK LINK --}}
                    <div class="text-center text-sm" style="color: #155665; opacity: 0.8;">
                        Not an admin?
                        <a href="{{ route('login') }}" class="font-semibold hover:underline" style="color: #1A998F;">
                            User Login
                        </a>
                    </div>

                </div>
            </div>

            {{-- ERROR --}}
            @if ($errors->any())
            <div class="flex items-start gap-3 p-4 rounded-xl mt-6 shadow-lg border"
                style="background: rgba(255,255,255,0.85); border-color: rgba(21,86,101,0.3);">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: #102E3C;" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span class="text-sm font-medium" style="color: #102E3C;">{{ $errors->first() }}</span>
            </div>
            @endif

        </div>
    </div>
</x-layout>
