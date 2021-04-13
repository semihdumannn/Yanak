<?php


namespace App\Repositories;


use App\User;
use Illuminate\Support\Facades\Validator;


class UserRepository
{
    public function getUserById(User $user)
    {
        return $user;
    }

    public function update(User $user,array $data)
    {
        try {
            $this->validator($data)->validate();
            $data['password'] = !empty($data['password'])? bcrypt($data['password']) : $user->password;
            $user->update($data);
            session()->flash('result','success');
            session()->flash('message','İşlem Başarılı');
        }catch (\Exception $exception)
        {
            session()->flash('result','error');
            session()->flash('message',$exception->getMessage());

        }

    }

    public function validator(array $data)
    {
        return Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }
}