<?php

namespace App\Repositories;
// use App\User\Userinfo;
// use Illuminate\Database\Eloquent\Model;

Interface TagInterface
{
    // public function all();

    // public function getByUser(Userinfo $user);

    public function store( $attributes);

    public function remove($id);

    // public function update(array $attributes, User $user);

    // public function delete(User $user);

    // public function show(User $user);
}