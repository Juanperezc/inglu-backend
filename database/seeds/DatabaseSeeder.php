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
        ClaimSeeder::class,
        ContactSeeder::class,
        SpecialtySeeder::class,
        SuggestionSeeder::class,
        TreatmentSeeder::class,
        WalkthroughSeeder::class,
        RolePermissionSeeder::class,
        UserSeeder::class,
        EventSeeder::class, 
        AppointmentSeeder::class,
        MedicalRecordSeeder::class,
        PostCategorySeeder::class,
        PostSeeder::class,
        ]);
    }
}
