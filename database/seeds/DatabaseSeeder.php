<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        SiteJoinSeeder::class,
        SiteInformationSeeder::class,
        SiteSettingSeeder::class,
        SiteHWorkSeeder::class,
        SiteHWorkItemSeeder::class,
        SiteImageSeeder::class,
        SiteImageItemSeeder::class,
        SiteTeamSeeder::class,
        SiteTeamMemberSeeder::class,
        FaqSeeder::class,
        ContactSeeder::class,
        SpecialtySeeder::class,
        TreatmentSeeder::class,
        WalkthroughSeeder::class,
        RolePermissionSeeder::class,
        UserSeeder::class,
        ClaimSeeder::class,
        SuggestionSeeder::class,
        EventSeeder::class, 
        MedicalRecordSeeder::class,
        PostCategorySeeder::class,
        PostSeeder::class,
        AppointmentSeeder::class
        ]);
    }
}
