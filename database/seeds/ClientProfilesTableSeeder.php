<?php

use Illuminate\Database\Seeder;

class ClientProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $clients */
        $clients = \App\Models\Client::all();
        $countClients = $clients->count();

        /** @var \Illuminate\Database\Eloquent\Collection $collectionIndividual */
        $collectionIndividual = factory(\App\Models\ClientProfile::class,$countClients)->make();
        $collectionIndividual->each(function ($clientProfile) use ($clients){
            $clientProfile->client_id = $clients->random()->id;
            $clientProfile->save();
        });
    }
}
