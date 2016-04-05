<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class InitRoutesController extends Controller
{
    //
    public function index()
    {
      if (\Schema::hasTable('users')) {
        $users = User::all()->toArray();
        if (empty($users)) {
          return redirect('auth/register');
        } else {
          return redirect('items');
        }
      } else {
        \Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('password', 60);
          $table->rememberToken();
          $table->timestamps();
        });
        \Schema::create('password_resets', function (Blueprint $table) {
          $table->string('email')->index();
          $table->string('token')->index();
          $table->timestamp('created_at');
        });
        \Schema::create('items', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->integer('sort');
          $table->timestamps();
        });
        \Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->string('title');
            $table->text('body');
            $table->tinyInteger('state');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('item_id')
                        ->references('id')
                        ->on('items')
                        ->onDelete('cascade');
        });
        return redirect('auth/register');
      }
    }
}
