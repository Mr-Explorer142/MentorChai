<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * 15 users total:
     *  - 8 students
     *  - 7 mentors
     *
     * Each user gets a role-appropriate profile.
     * All passwords are: password
     */
    public function run(): void
    {
        // Super Admin — master access
        User::updateOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name'              => 'Super Admin',
                'password'          => Hash::make('admin123'),
                'role'              => UserRole::Admin,
                'is_super_admin'    => true,
                'email_verified_at' => now(),
            ]
        );

        // ── 8 Students ────────────────────────────────────────────────
        User::factory()
            ->count(18)
            ->student()
            ->create()
            ->each(function (User $user) {
                $user->profile()->create(
                    Profile::factory()->student()->make()->toArray()
                );
            });

        // ── 7 Mentors ─────────────────────────────────────────────────
        User::factory()
            ->count(12)
            ->mentor()
            ->create()
            ->each(function (User $user) {
                $user->profile()->create(
                    Profile::factory()->mentor()->make()->toArray()
                );
            });

        $this->command->info('✅ 1 Super Admin + 30 users seeded: 18 students + 12 mentors (password: password)');
    }
}
