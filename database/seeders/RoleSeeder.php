<?php

namespace Database\Seeders;

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
        $roleAdmin = Role::create(['name'=>'Admin']);
        $roleVendedor = Role::create(['name'=>'Vendedor']);

        Permission::create(['name'=>'home'])->syncRoles([$roleAdmin,$roleVendedor]);
        
        Permission::create(['name'=>'animalito.index'])->assignRole($roleAdmin);
        Permission::create(['name'=>'animalito.show'])->assignRole($roleAdmin);
        Permission::create(['name'=>'animalito.update'])->assignRole($roleAdmin);
        Permission::create(['name'=>'animalito.store'])->assignRole($roleAdmin);
        Permission::create(['name'=>'animalito.destroy'])->assignRole($roleAdmin);

        Permission::create(['name'=>'loteria.index'])->assignRole($roleAdmin);
        Permission::create(['name'=>'loteria.show'])->assignRole($roleAdmin);
        Permission::create(['name'=>'loteria.update'])->assignRole($roleAdmin);
        Permission::create(['name'=>'loteria.store'])->assignRole($roleAdmin);
        Permission::create(['name'=>'loteria.destroy'])->assignRole($roleAdmin);

        Permission::create(['name'=>'sorteo.index'])->assignRole($roleAdmin);
        Permission::create(['name'=>'sorteo.show'])->assignRole($roleAdmin);
        Permission::create(['name'=>'sorteo.update'])->assignRole($roleAdmin);
        Permission::create(['name'=>'sorteo.store'])->assignRole($roleAdmin);
        Permission::create(['name'=>'sorteo.destroy'])->assignRole($roleAdmin);

        Permission::create(['name'=>'resultado.index'])->assignRole($roleAdmin);
        Permission::create(['name'=>'resultado.show'])->assignRole($roleAdmin);
        Permission::create(['name'=>'resultado.update'])->assignRole($roleAdmin);
        Permission::create(['name'=>'resultado.store'])->assignRole($roleAdmin);
        Permission::create(['name'=>'resultado.destroy'])->assignRole($roleAdmin);

        Permission::create(['name'=>'banca.index'])->assignRole($roleAdmin);
        Permission::create(['name'=>'banca.show'])->assignRole($roleAdmin);
        Permission::create(['name'=>'banca.update'])->assignRole($roleAdmin);
        Permission::create(['name'=>'banca.store'])->assignRole($roleAdmin);
        Permission::create(['name'=>'banca.destroy'])->assignRole($roleAdmin);

        Permission::create(['name'=>'user.index'])->assignRole($roleAdmin);
        Permission::create(['name'=>'user.show'])->assignRole($roleAdmin);
        Permission::create(['name'=>'user.update'])->assignRole($roleAdmin);
        Permission::create(['name'=>'user.store'])->assignRole($roleAdmin);
        Permission::create(['name'=>'user.destroy'])->assignRole($roleAdmin);
        
        Permission::create(['name'=>'contabilidadTotal.index'])->assignRole($roleAdmin);
        Permission::create(['name'=>'contabilidadTotal.show'])->assignRole($roleAdmin);
        Permission::create(['name'=>'contabilidadTotal.update'])->assignRole($roleAdmin);
        Permission::create(['name'=>'contabilidadTotal.store'])->assignRole($roleAdmin);
        Permission::create(['name'=>'contabilidadTotal.destroy'])->assignRole($roleAdmin);
        
        Permission::create(['name'=>'ticket.index'])->syncRoles([$roleAdmin,$roleVendedor]);
        Permission::create(['name'=>'ticket.show'])->syncRoles([$roleAdmin,$roleVendedor]);
        Permission::create(['name'=>'ticket.update'])->syncRoles([$roleAdmin,$roleVendedor]);
        Permission::create(['name'=>'ticket.store'])->syncRoles([$roleAdmin,$roleVendedor]);
        Permission::create(['name'=>'ticket.destroy'])->syncRoles([$roleAdmin,$roleVendedor]);

        Permission::create(['name'=>'contabilidad.index'])->syncRoles([$roleAdmin,$roleVendedor]);
        Permission::create(['name'=>'contabilidad.show'])->syncRoles([$roleAdmin,$roleVendedor]);
        Permission::create(['name'=>'contabilidad.update'])->syncRoles([$roleAdmin,$roleVendedor]);
        Permission::create(['name'=>'contabilidad.store'])->syncRoles([$roleAdmin,$roleVendedor]);
        Permission::create(['name'=>'contabilidad.destroy'])->syncRoles([$roleAdmin,$roleVendedor]);

        
    }
}
