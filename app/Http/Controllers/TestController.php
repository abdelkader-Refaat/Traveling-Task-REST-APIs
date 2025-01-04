<?php

namespace App\Http\Controllers;

use DateTime;
use App\Class\Parenthesis;
use App\UserRole;
use Carbon\Carbon;
use App\ChildClass;
use App\Models\Tour;
use App\Models\User;
use App\RoleUserEnum;
use App\Models\Travel;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Builder;

class TestController extends Controller
{
    private static $name = 'abdelkader';
    /**
     * Handle the incoming request.
     */



    public function __invoke(Request $request)
    {
        return new Parenthesis()->name; 
        // return new Parenthesis()->test(10);
    }

    //     //  return value by refrence .
    //     $value = 10;
    //     $this->increment($value);
    //     return $value;
    // }

    // private function increment(&$number)
    // {
    //     return $number += 5;
    // }

    /*

            Role::first()->givePermissionTo('create new');
            Role::first()->givePermissionTo('edit new');
            Role::first()->givePermissionTo('delete new');
            User::firstOrFail()->givePermissionTo('delete new');
            User::firstOrFail()->assignRole('admin');
            User::firstOrFail()->assignRole('editor');
            $user = User::findOrFail(1);
            if($user->can('delete new') && $user->hasRole('admin')){
                return 'abdelkader can delete new permision and has admin role';

            }
            return 'this user dont have this role or permissions';
       return Role::create(['name' => 'super_admin'])->get();
            $user =  User::findOrFail(auth()->id());
            $user->assignRole('super_admin');
           if($user->hasRole('super_admin')){
            return ;
           }
           return 'u cant';
    $permission = Permission::create(['name' => 'edit']);
    $role = Role::firstOrCreate(['name' => 'writer']);
    $permission = Permission::firstOrCreate(['name' => 'edit articles']);
    $role->givePermissionTo($permission);
   return  $users =  User::whereHas('roles', function ($query) {
    $query->where('name', 'admin');
})->get();
    // $permission->assignRole($role);
    // $role->revokePermissionTo($permission);

    return 'role ' . $role . '<br>'. 'permisssion ' . $permission ;

      $tour =  Tour::updateOrCreate(['name' => 'Mr. abdelkader'] , ['travel_id' => 20 , 'starting_date' => '2024-01-09' ,'ending_date' => '2024-07-04 06:48:33' , 'price' =>  2000]);
        return $tour;


        $user = User::find(11);
        $token =  $user->createToken('token-name', ['server:update']);
        $user->update(['settings' => str()->substr($token->plainTextToken , 10,10 )]);
        return $user;
    */
}
