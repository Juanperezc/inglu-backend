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
        FaqSeeder::class,
        ClaimSeeder::class,
        ContactSeeder::class,
        SpecialtySeeder::class,
        SuggestionSeeder::class,
       EventSeeder::class, 
        TreatmentSeeder::class,
        WalkthroughSeeder::class,
        RolePermissionSeeder::class,
        UserSeeder::class,
        AppointmentSeeder::class,
        MedicalRecordSeeder::class,
        PostCategorySeeder::class,
        PostSeeder::class,
        ]);
    }
}
