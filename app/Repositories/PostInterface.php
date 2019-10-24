<?php

namespace App\Repositories;
use App\Post;
// use App\User\Userinfo;
// use Illuminate\Database\Eloquent\Model;

Interface PostInterface
{
    // public function all();

    // public function getByUser(Userinfo $user);

    public function store( $attributes);
    

    // public function update(array $attributes, User $user);

    // public function delete(User $user);

    public function show($post);
}