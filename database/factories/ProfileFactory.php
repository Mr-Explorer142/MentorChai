<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    protected $model = Profile::class;
    /**
     * Mentor-specific skills pool (Bengali context).
     */
    private static array $mentorSkills = [
        'PHP,Laravel,MySQL',
        'Python,Django,Machine Learning',
        'JavaScript,React,Node.js',
        'Java,Spring Boot,Hibernate',
        'Flutter,Dart,Firebase',
        'UI/UX Design,Figma,Adobe XD',
        'Data Science,Pandas,NumPy',
        'C++,Algorithms,Data Structures',
        'Android,Kotlin,Jetpack Compose',
        'DevOps,Docker,CI/CD',
    ];

    /**
     * Education levels.
     */
    private static array $educationLevels = [
        'Bachelor\'s',
        'Master\'s',
        'PhD',
        'Diploma',
    ];

    /**
     * Departments.
     */
    private static array $departments = [
        'CSE',
        'EEE',
        'BBA',
        'English',
        'Mathematics',
        'Physics',
        'Civil Engineering',
        'Architecture',
    ];

    /**
     * Institutions (Bangladesh context).
     */
    private static array $institutions = [
        'BUET',
        'Dhaka University',
        'BRAC University',
        'North South University',
        'RUET',
        'CUET',
        'KUET',
        'IUT',
        'Jahangirnagar University',
        'SUST',
        'Daffodil International University',
    ];

    /**
     * Define the model's default state.
     * The role-specific fields (skills, hourly_rate) are left null here
     * and populated via student()/mentor() states or in the seeder.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio'                     => fake()->paragraph(2),
            'phone'                   => '01' . fake()->numerify('#########'),
            'avatar'                  => null,
            'date_of_birth'           => fake()->dateTimeBetween('-35 years', '-18 years')->format('Y-m-d'),
            'address'                 => fake()->city() . ', Bangladesh',
            'highgest_education_level' => fake()->randomElement(self::$educationLevels),
            'institution_name'        => fake()->randomElement(self::$institutions),
            'department'              => fake()->randomElement(self::$departments),
            'is_online'               => fake()->boolean(20), // 20% chance online
            'rating'                  => null,
            'total_sessions'          => 0,
            // Role-specific — null by default
            'skills'                  => null,
            'hourly_rate'             => null,
        ];
    }

    /**
     * Student profile state — no skills or hourly rate.
     */
    public function student(): static
    {
        return $this->state(fn() => [
            'skills'       => null,
            'hourly_rate'  => null,
            'total_sessions' => fake()->numberBetween(0, 10),
        ]);
    }

    /**
     * Mentor profile state — has skills, hourly rate, rating, sessions.
     */
    public function mentor(): static
    {
        return $this->state(fn() => [
            'skills'         => fake()->randomElement(self::$mentorSkills),
            'hourly_rate'    => fake()->randomElement(['300', '400', '500', '600', '750', '1000', '1200', '1500']),
            'rating'         => fake()->randomFloat(1, 3.0, 5.0),
            'total_sessions' => fake()->numberBetween(5, 80),
        ]);
    }
}
