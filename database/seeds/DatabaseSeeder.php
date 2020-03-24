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
        SpecialtySeeder::class,
        SuggestionSeeder::class,
        WorkspaceSeeder::class,
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