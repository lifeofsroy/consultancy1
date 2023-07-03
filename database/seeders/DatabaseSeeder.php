<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Faq;
use App\Models\Role;
use App\Models\User;
use App\Models\Course;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Permission;
use App\Models\Institution;
use App\Models\Testimonial;
use App\Models\CourseComment;
use App\Models\CourseCategory;
use App\Models\Gallery;
use App\Models\ServiceComment;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;
use App\Models\InstitutionComment;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::factory()->create([
        //     'name' => 'Im Admin',
        //     'email' => 'admin@domain.com',
        //     'password' => Hash::make('PASSword@78626'),
        // ]);

        // $role = Role::create(['name' => 'Admin']);

        // Permission::create(['name' => 'Authorized']);
        // Permission::create(['name' => 'Update About Page']);
        // Permission::create(['name' => 'Update Contact Page']);
        // Permission::create(['name' => 'Update Donate Page']);
        // Permission::create(['name' => 'Update Extra Page']);
        // Permission::create(['name' => 'Update Home Page']);
        // Permission::create(['name' => 'Update Volunteer Page']);
        // Permission::create(['name' => 'Update Header Footer']);
        // Permission::create(['name' => 'Update Breadcrumb']);
        // Permission::create(['name' => 'Update Section Title']);
        // Permission::create(['name' => 'Analytics Page']);

        // $role->givePermissionTo('Authorized');
        // $user->assignRole($role);

        // User::factory(20)->create();
        // ServiceCategory::factory(8)->create();
        // Service::factory(5)->create();
        // Faq::factory(150)->create();
        // ServiceComment::factory(300)->create();
        // Institution::factory(5)->create();
        // CourseCategory::factory(8)->create();
        Course::factory(10)->create();
        // Slider::factory(8)->create();
        // Notice::factory(4)->create();
        // Testimonial::factory(20)->create();
        // Partner::factory(20)->create();
        // CourseComment::factory(100)->create();
        // InstitutionComment::factory(100)->create();
        // Gallery::factory(100)->create();

        $this->call([
            // HomeWelcomeSeeder::class,
            // HomeAppointmentSeeder::class,
            // AboutWelcomeSeeder::class,
            // MissionVisionSeeder::class,
            // WorkProcessSeeder::class,
            // ContactInfoSeeder::class,
            // HeaderSeeder::class,
            // FooterSeeder::class,
            // SocialLinkSeeder::class,
            // TermConditionSeeder::class,
            // PrivacyPolicySeeder::class,
            // CookiePolicySeeder::class,
            // CallToActionSeeder::class,
            // PluginSeeder::class,
            // HomeFaqSeeder::class,
        ]);
    }
}
