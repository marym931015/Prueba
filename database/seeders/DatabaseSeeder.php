<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Country;
use App\Models\Team;
use App\Models\Category;
use App\Models\User;
use App\Models\Membership;
use App\Models\Version;
use App\Models\Setting;
use App\Models\Feedback;
use App\Models\ComercialRole;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $admin = Role::create([
      'name' => 'Administrator',
      'description' => 'Administrator'
    ]);

    $admin->permissions()->createMany([
      [
        'uri' => 'create_all',
        'description' => 'Crear todo'
      ],
      [
        'uri' => 'read_all',
        'description' => 'Leer todo'
      ],
      [
        'uri' => 'update_all',
        'description' => 'Editar todo'
      ],
      [
        'uri' => 'delete_all',
        'description' => 'Eliminar todo'
      ]
    ]);

    $client = Role::create([
      'name' => 'Client',
      'description' => 'Client'
    ]);

    $client->permissions()->createMany([
      [
        'uri' => 'create_team',
        'description' => 'Crear grupo'
      ],
      [
        'uri' => 'read_team',
        'description' => 'Leer grupo'
      ],
      [
        'uri' => 'update_team',
        'description' => 'Editar grupo'
      ],
      [
        'uri' => 'delete_team',
        'description' => 'Eliminar grupo'
      ]
    ]);

    ComercialRole::create([
      'name' => 'Broker',
      'description' => 'Brokers buyers and sellers',
      'uri' => 'broker'
    ]);

    ComercialRole::create([
      'name' => 'Sells Rep',
      'description' => 'Only buyers',
      'uri' => 'sell_rep'
    ]);

    ComercialRole::create([
      'name' => 'Manufacturer',
      'description' => 'Manufacturing buyers and sellers',
      'uri' => 'manufacturer'
    ]);

    ComercialRole::create([
      'name' => 'Whole Sale',
      'description' => 'Only sellers',
      'uri' => 'whole_sale'
    ]);

    ComercialRole::create([
      'name' => 'Retail',
      'description' => 'Only buyers',
      'uri' => 'retail'
    ]);

    $country = Country::create([
      'iso_code' => 'MX',
      'name' => 'México',
      'phone_code' => '+52'
    ]);

    $state = $country->states()->createMany([
      ['name' => 'Aguascalientes'],
      ['name' => 'Baja California'],
      ['name' => 'Baja California Sur'],
      ['name' => 'Chihuahua'],
      ['name' => 'Chiapas'],
      ['name' => 'Ciudad de México'],
      ['name' => 'Coahuila de Zaragoza'],
      ['name' => 'Colima'],
      ['name' => 'Durango'],
      ['name' => 'Guanajuato'],
      ['name' => 'Guerrero'],
      ['name' => 'Hidalgo'],
      ['name' => 'Jalisco'],
      ['name' => 'México'],
      ['name' => 'Michoacán de Ocampo'],
      ['name' => 'Morelos'],
      ['name' => 'Nayarit'],
      ['name' => 'Nuevo León'],
      ['name' => 'Oaxaca'],
      ['name' => 'Puebla'],
      ['name' => 'Querétaro'],
      ['name' => 'Quintana Roo'],
      ['name' => 'San Luis Potosí'],
      ['name' => 'Sinaloa'],
      ['name' => 'Tabasco'],
      ['name' => 'Tamaulipas'],
      ['name' => 'Tlaxcala'],
      ['name' => 'Veracruz de Ignacio de la Llave'],
      ['name' => 'Yucatán'],
      ['name' => 'Zacatecas']
    ]);

    $user = User::create([
      'first_name' => 'IdooGroup',
      'last_name' => 'Admin',
      'email' => 'idoogroup@gmail.com',
      'email_verified_at' => now(),
      'password' => 'idoogroup',
      'phone_number' => '99999999',
      'phone_number_verified_at' => now(),
      'country_id' => $country->id,
      'role_id' => $admin->id
    ]);

    $team = Team::create([
      'name' => 'Good Crown Admin',
      'user_id' => $user->id,
      'personal_team' => true
    ]);

    $user->current_team_id = $team->id;
    $user->save();

    $user->teams()->save($team);

    $pub = Category::create([
      'name' => 'Publication',
      'description' => 'Publication'
    ]);

    $pub->delete();
    
    Category::create([
      'name' => 'Electronic',
      'description' => 'Electronic'
    ]);

    Category::create([
      'name' => 'Real State',
      'description' => 'Real State'
    ]);

    Category::create([
      'name' => 'Stock Market',
      'description' => 'Stock Market'
    ]);

    $clothing = Category::create([
      'name' => 'Clothing & More',
      'description' => 'Clothing & More'
    ]);

    $clothing->products()->createMany([
      [
        'name' => 'Cascos de seguridad'
      ],
      [
        'name' => 'Protección para el rostro'
      ],
      [
        'name' => 'Orejeres'
      ]
    ]);

    $service = Category::create([
      'name' => 'Services',
      'description' => 'Services'
    ]);

    Category::create([
      'name' => 'PPE',
      'description' => 'PPE'
    ]);

    Category::create([
      'name' => 'Social Media',
      'description' => 'Social Media'
    ]);

    Category::create([
      'name' => 'Investors',
      'description' => 'Investors'
    ]);

    $general = Category::create([
      'name' => 'General Merchandise',
      'description' => 'General Merchandise'
    ]);

    $gloves = Category::create([
      'name' => 'Only Gloves',
      'description' => 'Only Gloves'
    ]);

    // $teamMedical = Team::create([
    //   'name' => 'Medical PPE Group',
    //   'description' => 'Medium Protective Equipment Sales Group',
    //   'user_id' => $user->id,
    //   'personal_team' => false
    // ]);

    // $teamMedical->categories()->attach($service->id);

    // $user->teams()->save($teamMedical);

    // $teamClothes = Team::create([
    //   'name' => 'Clothes Group',
    //   'description' => 'Clothing Sales Group',
    //   'user_id' => $user->id,
    //   'personal_team' => false
    // ]);

    // $teamClothes->categories()->attach($clothing->id);

    // $user->teams()->save($teamClothes);

    // $teamMiscellaneous = Team::create([
    //   'name' => 'Miscellaneous Group',
    //   'description' => 'Miscellaneous Sales Group',
    //   'user_id' => $user->id,
    //   'personal_team' => false
    // ]);

    // $teamMiscellaneous->categories()->attach($gloves->id);

    // $user->teams()->save($teamMiscellaneous);

    $teamGeneral = Team::create([
      'name' => 'General Group',
      'description' => 'General Group',
      'user_id' => $user->id,
      'personal_team' => false
    ]);

    $teamGeneral->categories()->attach($general->id);

    $user->teams()->save($teamGeneral);



    Membership::create([
      'name' => 'Primary',
      'description' => 'Nonumy diam vero vero et invidunt dolores nonumy voluptua diam. Invidunt sea eirmod dolores et eirmod magna no accusam labore, invidunt magna dolor accusam kasd voluptua stet gubergren eos consetetur. Eirmod justo duo sed dolor dolores, lorem ipsum no et et lorem. Dolores elitr amet sea sanctus lorem, et takimata.',
      'image_path' => 'memberships/primary.png'
    ]);

    Membership::create([
      'name' => 'Secundary',
      'description' => 'Nonumy diam vero vero et invidunt dolores nonumy voluptua diam. Invidunt sea eirmod dolores et eirmod magna no accusam labore, invidunt magna dolor accusam kasd voluptua stet gubergren eos consetetur. Eirmod justo duo sed dolor dolores, lorem ipsum no et et lorem. Dolores elitr amet sea sanctus lorem, et takimata.',
      'image_path' => 'memberships/secundary.png'
    ]);

    Version::create([
      'name' => 'GooCrown Classic',
      'version' => '1.0.0',
      'notes' => 'First release'
    ]);

    Setting::create([
      'key' => 'APP_MAINTENANCE',
      'val' => 'false'
    ]);

    Setting::create([
      'key' => 'APP_VERSION',
      'val' => '1.0.0'
    ]);

    Setting::create([
      'key' => 'APP_FORCE_VERSION',
      'val' => 'false'
    ]);

    Setting::create([
      'key' => 'ENABLE_PUSH_NOTIFICATION',
      'val' => 'false'
    ]);

    Setting::create([
      'key' => 'INIT_LIMIT_GROUP_MEMBERS',
      'val' => '200'
    ]);

    Setting::create([
      'key' => 'INIT_LIMIT_BROKER_ROLES',
      'val' => '10'
    ]);
    
    Setting::create([
      'key' => 'INIT_LIMIT_SELL_REP_ROLES',
      'val' => '10'
    ]);
    
    Setting::create([
      'key' => 'INIT_LIMIT_MANUFACTURER_ROLES',
      'val' => '10'
    ]);

    Setting::create([
      'key' => 'INIT_LIMIT_WHOLE_SALE_ROLES',
      'val' => '10'
    ]);
    
    Setting::create([
      'key' => 'INIT_LIMIT_RETAIL_ROLES',
      'val' => '10'
    ]);

    Feedback::create([
      'user_id' => 1,
      'subject' => 'How to install the app?',
      'text' => "Hello, I have problems installing the apk, I don't know where to download it"
    ]);

    $cuba = Country::create([
      'iso_code' => 'CU',
      'name' => 'Cuba',
      'phone_code' => '+53'
    ]);

    $cuba->states()->create(['name' => 'Guantánamo']);

    $eeuu = Country::create([
      'iso_code' => 'US',
      'name' => 'United States',
      'phone_code' => '+1'
    ]);

    $eeuu->states()->createMany([
      ['name' => 'Alabama'],
      ['name' => 'Alaska'],
      ['name' => 'Arizona'],
      ['name' => 'Arkansas'],
      ['name' => 'California'],
      ['name' => 'North Carolina'],
      ['name' => 'South Carolina'],
      ['name' => 'Colorado'],
      ['name' => 'Connecticut'],
      ['name' => 'North Dakota'],
      ['name' => 'South Dakota'],
      ['name' => 'Delaware'],
      ['name' => 'Florida'],
      ['name' => 'Georgia'],
      ['name' => 'Hawaii'],
      ['name' => 'Idaho'],
      ['name' => 'Illinois'],
      ['name' => 'Indiana'],
      ['name' => 'Iowa'],
      ['name' => 'Kansas'],
      ['name' => 'Kentucky'],
      ['name' => 'Louisiana'],
      ['name' => 'Maine'],
      ['name' => 'Maryland'],
      ['name' => 'Massachusetts'],
      ['name' => 'Michigan'],
      ['name' => 'Minnesota'],
      ['name' => 'Mississippi'],
      ['name' => 'Missouri'],
      ['name' => 'Montana'],
      ['name' => 'Nebraska'],
      ['name' => 'Nevada'],
      ['name' => 'New Jersey'],
      ['name' => 'New York'],
      ['name' => 'New Hampshire'],
      ['name' => 'New Mexico'],
      ['name' => 'Ohio'],
      ['name' => 'Oklahoma'],
      ['name' => 'Oregon'],
      ['name' => 'Pennsylvania'],
      ['name' => 'Rhode Island'],
      ['name' => 'Tennessee'],
      ['name' => 'Texas'],
      ['name' => 'Utah'],
      ['name' => 'Vermont'],
      ['name' => 'Virginia'],
      ['name' => 'West Virginia'],
      ['name' => 'Washington'],
      ['name' => 'Wisconsin'],
      ['name' => 'Wyoming'],
    ]);

    

  }
}
