<?php

namespace App\Livewire\UserManagements;

use Livewire\Component;

use App\Models\User;

use App\Models\Role;

class AddUser extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $role_id;

    public function render()
    {
        return view('livewire.user-managements.add-user');
    }

    public function addUser(){
        $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer'
        ]);

        try{
            // Saving the user to database
            $user = new User;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->password = $this->password;
            $user->save();

            // Checking if the user has been saved
            if($user){
                // Finding the role and later assigning role to saved user
                $role = Role::findOrFail($this->role_id);

                \DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => $role->id
                ]);
            }

            session()->flash('message', 'Form submitted successfully.');
            
            // Redirect to products page
            return redirect(route('warehouses.list'));
        }catch(\Exception $e){
            session()->flash('error', 'An error occurred! ' . $e->getMessage());
        }
    }
}
