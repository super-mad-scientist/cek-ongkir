<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CekOngkirTest extends TestCase
{

    public function testCekOngkirSukses()
    {
        $data = [
            "origin" => "501",
            "destination" => "497",
            "weight" => "1000",
        ];

        $this->json('GET', 'api/cek-ongkir', $data, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    [
                        "code",
                        "name",
                        "costs" => [
                            [
                                "service",
                                "description",
                                "cost" => [
                                    [
                                        "etd",
                                        "note",
                                        "value"
                                    ]
                                ],
                            ]
                        ],
                    ]
                ],
                "success",
            ]);
    }

    public function testParameterTidakLengkap(){
        $data = [
            "origin" => "501",
            "destination" => "497",
        ];

        $this->json('GET', 'api/cek-ongkir', $data, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJsonStructure([
                "message",
                "errors" => [
                    "weight"
                ]
            ]);
    }
}
