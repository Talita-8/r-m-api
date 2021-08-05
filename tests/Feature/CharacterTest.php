<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CharacterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCharacterWithAllParams()
    {
        $response = $this->postJson('api/characters', 
        ['name' => 'John Doe',
         'status' => 'Alive', 
         'species' => 'Human', 
         'type' => 'None', 
         'gender' => 'Male', 
         'image' => 'https://raw.githubusercontent.com/Laboratoria/rick-and-morty-images/master/images/1.jpeg'
        ]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCharacterWithoutAllParams()
    {
        $response = $this->postJson('api/characters', 
        ['name' => 'John Doe',
         'status' => '', 
         'species' => 'Human', 
         'type' => 'None', 
         'gender' => 'Male', 
         'image' => 'https://raw.githubusercontent.com/Laboratoria/rick-and-morty-images/master/images/1.jpeg'
        ]);

        $response->assertStatus(422);
    }

    public function testCreateCharacterWithRepeatedName()
    {
        $response = $this->postJson('api/characters', 
        ['name' => 'Rick',
         'status' => 'Alive', 
         'species' => 'Human', 
         'type' => 'None', 
         'gender' => 'Male', 
         'image' => 'https://raw.githubusercontent.com/Laboratoria/rick-and-morty-images/master/images/1.jpeg'
        ]);

        $response->assertStatus(422);
    }

    public function testGetAllCharactersSucess()
    {
        $response = $this->getJson('api/characters');

        $response->assertStatus(200);
    }
}
