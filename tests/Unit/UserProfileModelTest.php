<?php

namespace Tests\Unit;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_profile_relationship(): void
    {
        $user = User::factory()->create();
        $profile = Profile::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(Profile::class, $user->profile);
        $this->assertEquals($user->id, $profile->user->id);
    }

    public function test_profile_pending_documents_logic(): void
    {
        $user = User::factory()->create();

        $profile = Profile::factory()->create([
            'user_id' => $user->id,
            'is_verified' => false,
            'documents_submitted_at' => now(),
            'nid_front' => 'front.jpg',
            'nid_back' => null,
            'student_id_front' => null,
            'student_id_back' => null,
        ]);

        $this->assertTrue($profile->hasPendingDocuments());

        $profile->update(['is_verified' => true]);

        $this->assertFalse($profile->hasPendingDocuments());
    }
}
