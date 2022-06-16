<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_array = [];
        //beneficiario
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Beneficiarios']));

        // Beneficiarios fianzas
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Beneficiarios Finanza']));

        //Beneficiario Salud
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Atencion Anual']));

        //Atencion Periodica
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Atencion Periodica']));

        //Encargado
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Encargado']));

        //Inventario
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Inventario']));

        //Articulos
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Articulos']));
        //Categoria
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Categoria']));

        //Finanza Ingreso
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Finanza Ingreso']));

        //Finanza Egreso
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Finanza Egreso']));

        //Actividades
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Actividad']));

        //Colaborador
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Colaborador']));

        //roles
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Roles']));

        //user
        array_push($permissions_array, Permission::create(['name' => 'Gestionar Usuarios']));


        // usuarios
        array_push($permissions_array);
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $superAdminRole->syncPermissions($permissions_array);

    }
}
