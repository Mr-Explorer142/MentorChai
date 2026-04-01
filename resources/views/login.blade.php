<x-layout>
    <style>
        .auth-page {
            min-height: 100vh;
            background: linear-gradient(160deg, #eef7f8 0%, #f8fdfE 55%, #f0f9f4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
            position: relative;
            overflow: hidden;
        }

        /* Soft background blobs */
        .auth-blob-1 {
            position: absolute;
            top: -60px;
            left: -60px;
            width: 340px;
            height: 340px;
            background: radial-gradient(circle, rgba(40, 102, 110, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .auth-blob-2 {
            position: absolute;
            bottom: -80px;
            right: -60px;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(124, 152, 133, 0.07) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .auth-card {
            background: white;
            border-radius: 24px;
            border: 1px solid rgba(40, 102, 110, 0.1);
            box-shadow: 0 8px 40px rgba(40, 102, 110, 0.1);
            padding: 2.2rem;
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
        }

        /* Brand logo icon */
        .auth-logo-wrap {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            background: linear-gradient(135deg, #28666e, #033f63);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(40, 102, 110, 0.25);
            margin-bottom: 1rem;
        }

        .auth-brand {
            font-family: 'Lora', serif;
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(135deg, #28666e 0%, #033f63 60%, #7c9885 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Social buttons */
        .auth-social-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            padding: 0.6rem 1rem;
            border-radius: 12px;
            border: 1.5px solid rgba(40, 102, 110, 0.18);
            background: rgba(238, 247, 248, 0.4);
            font-weight: 600;
            font-size: 0.875rem;
            font-family: 'Nunito', sans-serif;
            color: #033f63;
            cursor: pointer;
            transition: background 0.18s, border-color 0.18s, box-shadow 0.18s;
            text-decoration: none;
        }

        .auth-social-btn:hover {
            background: white;
            border-color: rgba(40, 102, 110, 0.35);
            box-shadow: 0 3px 12px rgba(40, 102, 110, 0.1);
        }

        /* Divider */
        .auth-divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.2rem 0;
            color: rgba(3, 63, 99, 0.4);
            font-size: 0.8rem;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(40, 102, 110, 0.12);
        }

        /* Form fields */
        .auth-label {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.82rem;
            font-weight: 700;
            color: #033f63;
            margin-bottom: 0.4rem;
        }

        .auth-input {
            width: 100%;
            padding: 0.65rem 1rem;
            border-radius: 12px;
            border: 1.5px solid rgba(40, 102, 110, 0.18);
            background: rgba(238, 247, 248, 0.5);
            color: #033f63;
            font-size: 0.9rem;
            font-family: 'Nunito', sans-serif;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        .auth-input::placeholder {
            color: rgba(3, 63, 99, 0.35);
        }

        .auth-input:focus {
            border-color: #28666e;
            box-shadow: 0 0 0 3px rgba(40, 102, 110, 0.1);
            background: white;
        }

        /* Primary button */
        .auth-btn-primary {
            width: 100%;
            padding: 0.72rem 1rem;
            border-radius: 12px;
            background: #28666e;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
            font-family: 'Nunito', sans-serif;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background 0.18s, box-shadow 0.18s, transform 0.15s;
            text-decoration: none;
        }

        .auth-btn-primary:hover {
            background: #1a4a52;
            box-shadow: 0 6px 18px rgba(40, 102, 110, 0.28);
            transform: translateY(-1px);
            color: white;
        }

        .auth-btn-primary:active {
            transform: translateY(0);
        }

        /* Outline button */
        .auth-btn-outline {
            width: 100%;
            padding: 0.68rem 1rem;
            border-radius: 12px;
            background: transparent;
            color: #28666e;
            font-weight: 700;
            font-size: 0.875rem;
            font-family: 'Nunito', sans-serif;
            border: 1.5px solid #28666e;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background 0.18s, box-shadow 0.18s, transform 0.15s;
            text-decoration: none;
        }

        .auth-btn-outline:hover {
            background: rgba(40, 102, 110, 0.06);
            box-shadow: 0 4px 12px rgba(40, 102, 110, 0.12);
            transform: translateY(-1px);
            color: #28666e;
        }

        /* Checkbox */
        .auth-checkbox {
            accent-color: #28666e;
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        /* Error alert */
        .auth-error {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            background: #fff5f5;
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            padding: 0.9rem 1rem;
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #b91c1c;
        }

        /* Info box */
        .auth-info-box {
            background: rgba(40, 102, 110, 0.06);
            border: 1px solid rgba(40, 102, 110, 0.12);
            border-radius: 12px;
            padding: 0.85rem 1rem;
            font-size: 0.8rem;
            color: rgba(3, 63, 99, 0.75);
        }

        /* Switch role box */
        .auth-switch-box {
            background: rgba(238, 247, 248, 0.6);
            border: 1px solid rgba(40, 102, 110, 0.1);
            border-radius: 14px;
            padding: 1rem 1.2rem;
            text-align: center;
            margin-top: 1rem;
        }

        @keyframes authFadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-card {
            animation: authFadeUp 0.4s ease both;
        }
    </style>

    <div class="auth-page">
        <div class="auth-blob-1"></div>
        <div class="auth-blob-2"></div>

        <div style="width: 100%; max-width: 420px; position: relative; z-index: 1;">

            {{-- Brand Header --}}
            <div class="text-center mb-7">
                <div class="auth-logo-wrap">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                    </svg>
                </div>
                <h1 class="auth-brand block">MentorChai</h1>
                <p class="text-sm mt-1" style="color: rgba(3,63,99,0.5);">আপনার অ্যাকাউন্টে লগইন করুন</p>
            </div>

            <div class="auth-card">

                {{-- Social Login --}}
                <div class="flex flex-col gap-2.5 mb-1">
                    <button class="auth-social-btn">
                        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4" />
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853" />
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                fill="#FBBC05" />
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="#EA4335" />
                        </svg>
                        Google দিয়ে লগইন করুন
                    </button>
                    <button class="auth-social-btn">
                        <svg class="w-5 h-5 flex-shrink-0" fill="#1877F2" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                        Facebook দিয়ে লগইন করুন
                    </button>
                </div>

                <div class="auth-divider">অথবা</div>

                {{-- Login Form --}}
                <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="auth-label">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#28666e">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            ই-মেইল
                        </label>
                        <input type="email" name="email" class="auth-input" placeholder="আপনার ই-মেইল দিন" required />
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="auth-label">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#28666e">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            পাসওয়ার্ড
                        </label>
                        <input type="password" name="password" class="auth-input" placeholder="পাসওয়ার্ড দিন"
                            required />
                    </div>

                    {{-- Remember & Forgot --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="auth-checkbox" />
                            <span class="text-xs font-semibold" style="color: #033f63;">তথ্য সেভ রাখুন</span>
                        </label>
                        <a href="#" class="text-xs font-semibold" style="color: #28666e;">পাসওয়ার্ড ভুলেছেন?</a>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="auth-btn-primary">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        লগইন করুন
                    </button>

                    {{-- Admin Login --}}
                    <a href="{{ route('admin_login') }}" class="auth-btn-outline"
                        style="font-size: 0.8rem; padding: 0.55rem 1rem; border-style: dashed;">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        অ্যাডমিন লগইন
                    </a>
                </form>

                {{-- Register link --}}
                <div class="auth-switch-box mt-5">
                    <p class="text-xs mb-3" style="color: rgba(3,63,99,0.55);">MentorChai-তে নতুন?</p>
                    <a href="{{ route('student_register') }}" class="auth-btn-outline">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                        </svg>
                        নতুন অ্যাকাউন্ট খুলুন
                    </a>
                </div>

            </div>

            {{-- Error Messages --}}
            @if ($errors->any())
            <div class="auth-error mt-4">
                <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
            @endif

        </div>
    </div>
</x-layout>
