<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name'=>'Admin']);
        $empleado = Role::create(['name'=>'Empleado']);

    Permission::create(['name' => 'users.index'])->syncRoles($admin);
    Permission::create(['name' => 'users.edit'])->syncRoles($admin);
    
    Permission::create(['name' => 'cultivos index'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Ver cultivos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Editar cultivos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Crear cultivos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Eliminar cultivos'])->syncRoles([$admin, $empleado]);

    Permission::create(['name' => 'Inicio insumos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Ver insumos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Editar insumos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Crear insumos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Eliminar insumos'])->syncRoles([$admin, $empleado]);

    Permission::create(['name' => 'Inicio actividades'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Ver actividades'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Editar actividades'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Crear actividades'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Eliminar actividades'])->syncRoles([$admin, $empleado]);

    Permission::create(['name' => 'Inicio fases'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Ver fases'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Editar fases'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Crear fases'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Eliminar fases'])->syncRoles([$admin, $empleado]);

    Permission::create(['name' => 'Inicio costos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Ver costos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Editar costos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Crear costos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Eliminar costos'])->syncRoles([$admin, $empleado]);

    Permission::create(['name' => 'Inicio movimientos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Ver movimientos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Editar movimientos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Crear movimientos'])->syncRoles([$admin, $empleado]);
    Permission::create(['name' => 'Eliminar movimientos'])->syncRoles([$admin, $empleado]);





       
    }
}
