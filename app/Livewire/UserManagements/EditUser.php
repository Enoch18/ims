<?php

namespace App\Livewire\UserManagements;

use Livewire\Component;

use App\Models\User;

use App\Models\Role;

use Illuminate\Support\Facades\Hash;

class EditUser extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;
    public $role_id;
    public $user_id;

    public function mount($id){
        $user = User::find($id);

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;

        $this->user_id = $id;
    }

    public function render()
    {
        return view('livewire.user-managements.edit-user', [
            'roles' => Role::all()
        ]);
    }

    public function submitUser(){
        $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            // 'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer'
        ]);

        try{
            // Saving the user to database
            $user = User::find($this->user_id);
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->save();

            // Checking if the user has been saved
            if($user){
                // Finding the role and later assigning role to saved user
                $role = Role::findOrFail($this->role_id);

                //  Checking if role doesn't exist and then adding it.
                $role_user = \DB::table('role_user')->where('role_id', '=', $role->id)->where('user_id', '=', $user->id)->first();
                if(!$role_user){
                    \DB::table('role_user')->insert([
                        'user_id' => $user->id,
                        'role_id' => $role->id
                    ]);
                }
            }

            session()->flash('message', 'Form updated successfully.');
            
            // Redirect to products page
            return redirect(route('user-managements.list'));
        }catch(\Exception $e){
            session()->flash('error', 'An error occurred! ' . $e->getMessage());
        }
    }
}
