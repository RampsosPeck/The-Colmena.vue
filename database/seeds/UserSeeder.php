<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$suadmin = new User;
        $suadmin->fullname = 'Jorge Peralta';
        $suadmin->slug = Str::of('Jorge Peralta')->slug('-');
        $suadmin->celular = '75729198';
        $suadmin->email = 'jorge@gmail.com';
        $suadmin->password = bcrypt('secret');
        $suadmin->tipo = 'Super-Admin';
        $suadmin->save();

        $dmin = new User;
        $dmin->fullname = 'Abelina Chambi';
        $dmin->slug = Str::of('Abelina Chambi')->slug('-');
        $dmin->celular = '73558968';
        $dmin->email = 'abelina@gmail.com';
        $dmin->password = bcrypt('secret');
        $dmin->tipo = 'Administrador';
        $dmin->save();

        $venta = new User;
        $venta->fullname = 'Kimberly Chambi';
        $venta->slug = Str::of('Kimberly Chambi')->slug('-');
        $venta->celular = '73558258';
        $venta->email = 'kim@gmail.com';
        $venta->password = bcrypt('secret');
        $venta->tipo = 'Vendedora';
        $venta->save();

        $suadmin = new User;
        $suadmin->fullname = 'Juan Delivery';
        $suadmin->slug = Str::of('Juan Delivery')->slug('-');
        $suadmin->celular = '72582500';
        $suadmin->email = 'juan@gmail.com';
        $suadmin->password = bcrypt('secret');
        $suadmin->tipo = 'Delivery';
        $suadmin->direccion = 'Calle montecarlo número 20.';
        $suadmin->save();

        $suadmin = new User;
        $suadmin->fullname = 'Carla Ortega';
        $suadmin->slug = Str::of('Carla Ortega')->slug('-');
        $suadmin->celular = '73228960';
        $suadmin->email = 'carla@gmail.com';
        $suadmin->password = bcrypt('secret');
        $suadmin->tipo = 'Cliente';
        $suadmin->direccion = 'Calle montesinos sin numero.';
        $suadmin->save();

        $suadmin = new User;
        $suadmin->fullname = 'Marco Antelo';
        $suadmin->slug = Str::of('Marco Antelo')->slug('-');
        $suadmin->celular = '70000000';
        $suadmin->email = 'marco@gmail.com';
        $suadmin->password = bcrypt('secret');
        $suadmin->tipo = 'Cliente';
        $suadmin->direccion = 'Calle R montero nuero 100.';
        $suadmin->save();

    }
}
