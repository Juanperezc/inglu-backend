<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        
        $juan =  User::create([
        'name' => "Juan",
        'date_of_birth' => now(),
        'last_name' => "Perez",
        'id_card' => "V25141826",
        'email' => "juanl1996@hotmail.com",
        'type' => 2,
        'password' => '2514182657',
        'phone' => '04245869872',
        'address' => "Carrera 10 entre 13 y 15",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/portal/Juan.png"
        
       ]);
       $juan->roles()->attach(1);
       $manuel =  User::create([
        'name' => "Manuel",
        'date_of_birth' => now(),
        'last_name' => "Crespo",
        'id_card' => "V11111111",
        'type' => 2,
        'email' => "mcrespog@gmail.com",
        'password' => 'ucla2020',
        'phone' => '04241111111',
        'address' => ""
       ]);
       $manuel->roles()->attach(1);
       $marco = User::create([
        'name' => "Marco",
        'date_of_birth' => now(),
        'last_name' => "Sáenz",
        'id_card' => "V22222222",
        'type' => 2,
        'email' => "marco.saenz262@gmail.com",
        'password' => 'ucla2020',
        'phone' => '04241111111',
        'address' => "Carrera 15 #38-12",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/portal/Marco.png"
       ]);
       //medicos
       $pedro =  User::create([
        'name' => "Pedro",
        'date_of_birth' => now(),
        'last_name' => "Hernandez",
        'id_card' => "V20111222",
        'email' => "pedher@hotmail.com",
        'type' => 2,
        'password' => '20111222',
        'phone' => '04245869872',
        'address' => "Carrera 10 entre 13 y 15",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/profile/medics/pedro.jpg",
        ]);
       $rand_specialty = rand(1,8);
       $pedro->specialties()->attach($rand_specialty);
       $pedro->roles()->attach(2);
       $rafael =  User::create([
        'name' => "Rafael",
        'date_of_birth' => now(),
        'last_name' => "Pereira",
        'id_card' => "V12101102",
        'email' => "RafaelP@gmail.com",
        'type' => 2,
        'password' => '20111222',
        'phone' => '04245869872',
        'address' => "Avenida 10 con calle 19",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/profile/medics/rafael.jpg",
       ]);
       $rand_specialty = rand(1,8);
       $rafael->specialties()->attach($rand_specialty);
       $rafael->roles()->attach(2);
       $maria =  User::create([
        'name' => "Maria",
        'date_of_birth' => now(),
        'last_name' => "Rodriguez",
        'id_card' => "V11001945",
        'email' => "MRodriguez@gmail.com",
        'type' => 2,
        'password' => '20111222',
        'phone' => '04245869872',
        'address' => "Res Carvajal Torre 1, #38",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/profile/medics/maria.jpg",
        ]);
       $rand_specialty = rand(1,8);
       $maria->specialties()->attach($rand_specialty);
       $maria->roles()->attach(2);
       $cristina =  User::create([
        'name' => "Cristina",
        'date_of_birth' => now(),
        'last_name' => "Pieruzzini",
        'id_card' => "V13103975",
        'email' => "CristiP@gmail.com",
        'type' => 2,
        'password' => '20111222',
        'phone' => '04150219362',
        'address' => "Carrera 18 entre 30 y 31",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/profile/medics/cristina.jpeg",
        ]);
        $rand_specialty = rand(1,8);
        $cristina->specialties()->attach($rand_specialty);
        $cristina->roles()->attach(2);
        $laura =  User::create([
        'name' => "Laura",
        'date_of_birth' => now(),
        'last_name' => "Anzola",
        'id_card' => "V14902101",
        'email' => "Anzola.l@gmail.com",
        'type' => 2,
        'password' => '20111222',
        'phone' => '04164205501',
        'address' => "Calle 10 entre 12 y 13",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/profile/medics/laura.jpg",
        ]);
       $rand_specialty = rand(1,8);
       $laura->specialties()->attach($rand_specialty);
       $laura->roles()->attach(2);
       //Pacientes
       $michael =  User::create([
        'name' => "Michael",
        'date_of_birth' => now(),
        'last_name' => "Martinez",
        'id_card' => "V24952561",
        'email' => "MichMartinez76@gmail.com",
        'type' => 1,
        'password' => '20111222',
        'phone' => '04245039650',
        'address' => "Residencias roca del valle 3 #10",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/profile/patients/michael.jpg"
        ]);
       $michael->roles()->attach(4);
       $luis =  User::create([
        'name' => "Luis",
        'date_of_birth' => now(),
        'last_name' => "Leon",
        'id_card' => "V23152066",
        'email' => "leon.luis@gmail.com",
        'type' => 1,
        'password' => '20111222',
        'phone' => '0412560482901',
        'address' => "Calle 31 entre 10 y 11",
        'profile_pic' => "https://ingludiag.blob.core.windows.net/resources/image/profile/patients/luis.jpg"
       ]);
       $luis->roles()->attach(4);
       factory(User::class, 10)->create();
    }
}
