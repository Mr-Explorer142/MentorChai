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

        .auth-logo-wrap {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            background: linear-gradient(135deg, #3d8a8f, #7c9885);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(61, 138, 143, 0.28);
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
            border-color: #3d8a8f;
            box-shadow: 0 0 0 3px rgba(61, 138, 143, 0.12);
            background: white;
        }

        /* Student variant uses a slightly lighter teal accent */
        .auth-btn-primary-student {
            width: 100%;
            padding: 0.72rem 1rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #28666e, #3d8a8f);
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
            transition: opacity 0.18s, box-shadow 0.18s, transform 0.15s;
            text-decoration: none;
        }

        .auth-btn-primary-student:hover {
            opacity: 0.9;
            box-shadow: 0 6px 18px rgba(40, 102, 110, 0.28);
            transform: translateY(-1px);
            color: white;
        }

        .auth-btn-primary-student:active {
            transform: translateY(0);
        }

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

        .auth-checkbox {
            accent-color: #28666e;
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

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
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <h1 class="auth-brand block">স্টুডেন্ট অ্যাকাউন্ট</h1>
                <p class="text-sm mt-1" style="color: rgba(3,63,99,0.5);">শেখার যাত্রা শুরু করুন আজই</p>
            </div>

            <div class="auth-card">

                {{-- Social Signup --}}
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
                        Google দিয়ে শুরু করুন
                    </button>
                    <button class="auth-social-btn">
                        <svg class="w-5 h-5 flex-shrink-0" fill="#1877F2" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                        Facebook দিয়ে শুরু করুন
                    </button>
                </div>

                <div class="auth-divider">অথবা ই-মেইল দিয়ে</div>

                {{-- Registration Form --}}
                <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <input type="hidden" name="role" value="student">

                    {{-- Name --}}
                    <div>
                        <label class="auth-label">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#3d8a8f">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            সম্পূর্ণ নাম
                        </label>
                        <input type="text" name="name" class="auth-input" placeholder="আপনার পুরো নাম দিন" required />
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="auth-label">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#3d8a8f">
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
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#3d8a8f">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            পাসওয়ার্ড
                        </label>
                        <input type="password" name="password" class="auth-input" placeholder="শক্তিশালী পাসওয়ার্ড দিন"
                            required />
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label class="auth-label">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#3d8a8f">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            কনফার্ম পাসওয়ার্ড
                        </label>
                        <input type="password" name="password_confirmation" class="auth-input"
                            placeholder="পাসওয়ার্ড আবার দিন" required />
                    </div>

                    {{-- Terms --}}
                    <label class="flex items-start gap-2.5 cursor-pointer">
                        <input type="checkbox" class="auth-checkbox mt-0.5" required />
                        <span class="text-xs" style="color: rgba(3,63,99,0.7); line-height: 1.5;">
                            আমি <a href="#" style="color: #28666e; font-weight: 700;">শর্তাবলী</a> এবং
                            <a href="#" style="color: #28666e; font-weight: 700;">গোপনীয়তা নীতি</a>-তে সম্মত আছি
                        </span>
                    </label>

                    {{-- Register Button --}}
                    <button type="submit" class="auth-btn-primary-student">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                        রেজিস্টার করুন
                    </button>
                </form>

                {{-- Switch to Mentor --}}
                <div class="auth-switch-box">
                    <p class="text-xs mb-3" style="color: rgba(3,63,99,0.55);">মেন্টর হিসেবে যুক্ত হতে চান?</p>
                    <a href="{{ route('teacher_register') }}" class="auth-btn-outline"
                        style="font-size: 0.82rem; padding: 0.55rem 1rem;">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814" />
                        </svg>
                        মেন্টর অ্যাকাউন্ট খুলুন
                    </a>
                </div>

                {{-- Login link --}}
                <p class="text-center text-xs mt-4" style="color: rgba(3,63,99,0.55);">
                    ইতিমধ্যে অ্যাকাউন্ট আছে?
                    <a href="{{ route('login') }}" style="color: #28666e; font-weight: 700;">লগইন করুন</a>
                </p>

            </div>
        </div>
    </div>
</x-layout>
