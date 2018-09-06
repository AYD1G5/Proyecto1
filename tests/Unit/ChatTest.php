<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChatTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testExisteMensaje()
    { 
        $this->assertDatabaseHas('mensaje_estudiante', [
            'id_mensaje_estudiante' => '1'
        ]);
    }

    public function testExistePaginadeChat(){
        $response = $this->call('POST', '/login', [
        'email' => 'willyslider@gmail.com',
        'password' => '12345678',
        '_token' => csrf_token()
    ]);
    $response = $this->get('/chat');
        $this->assertEquals(200, $response->getStatusCode());
    }
    
}
