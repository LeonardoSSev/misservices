<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    public function testUser()
    {
        $dataUser = new \stdClass;
        
        $dataUser->name = "John";
        $dataUser->email = "john@johnn.com.br";
        $dataUser->cpf = "12131213214";
        $dataUser->state = "SP";
        $dataUser->city = "Santos";
        $dataUser->neighbourhood = "Esplanada";
        $dataUser->zipcode = "11340020";
        $dataUser->password = bcrypt("123456");
        $dataUser->address = "Rua Caminho dos Barreiros";
        $dataUser->role = "Client";

        $user = new User();
        $userTest = $user->insertUser( $dataUser );
        $this->assertTrue($userTest);
    }
}
