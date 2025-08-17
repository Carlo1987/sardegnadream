<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ServiceCategory;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = $this->getServices();

        foreach($services as $key => $service) {
            $serviceCategory = new ServiceCategory();
            $serviceCategory->name = $key;
            $serviceCategory->save();

            foreach($service as $row) {
                $service = new Service();
                $service->name = $row['name'];
                $service->image = $row['image'];
                $service->service_category_id = $serviceCategory->id;
                $service->save();
            }
        }
    }


    private function getServices()
    {
        return array(
            'Servizi igienici' => array(
                [
                    'name' => 'Acqua calda',
                    'image' => 'hot_water.png',
                ],
                [
                    'name' => 'Asciuga-capelli',
                    'image' => 'hairdryer.png',
                ],
                [
                    'name' => 'Carta igienica',
                    'image' => 'toilet_paper.png',
                ],
            ),
            'Lavanderia' => array(
                [
                    'name' => 'Lavatrice',
                    'image' => 'washing_machine.png',
                ],
                [
                    'name' => 'Asciugatrice',
                    'image' => 'dryer_machine.png',
                ],
                [
                    'name' => 'Ferro da stiro',
                    'image' => 'iron.png',
                ],
            ),
            'Cucina' => array(
                [
                    'name' => 'Frigorifero',
                    'image' => 'fridge.png',
                ],
                [
                    'name' => 'Posate',
                    'image' => 'cutlery.png',
                ],
                [
                    'name' => 'Pentole e padelle',
                    'image' => 'pan.png',
                ],
                [
                    'name' => 'Microonde',
                    'image' => 'microwave.png',
                ],
                [
                    'name' => 'Macchina caffè',
                    'image' => 'coffee_machine.png',
                ]
            ),
             'Intrattenimento' => array(
                [
                    'name' => 'Televisione',
                    'image' => 'television.png',
                ],
                [
                    'name' => 'Wi-fi',
                    'image' => 'wifi.png',
                ],
            ),
            'Bambini' => array(
                [
                    'name' => 'Culla',
                    'image' => 'crib.png',
                ],
                [
                    'name' => 'Seggiolino',
                    'image' => 'high_chair.png',
                ],
            ),
            'All\'aperto' => array(
                [
                    'name' => 'Balcone',
                    'image' => 'balcony.png',
                ],
                [
                    'name' => 'Arredam. esterno',
                    'image' => 'outdoor_furniture.png',
                ],
                [
                    'name' => 'Zona pranzo',
                    'image' => 'dining_area.png',
                ],
                [
                    'name' => 'Parcheggio',
                    'image' => 'parking_space.png',
                ],
            ),
            'Servizi vari' => array(
                [
                    'name' => 'Animali domestici',
                    'image' => 'animals.png',
                ],
                [
                    'name' => 'Fumo',
                    'image' => 'cigarette.png',
                ],
                [
                    'name' => 'Accoglienza',
                    'image' => 'hospitality.png',
                ],
            ),
            'Sicurezza' => array(
                [
                    'name' => 'Antincendio',
                    'image' => 'fire_protection.png',
                ],
                [
                    'name' => 'Monossido carbonio',
                    'image' => 'carbon_monoxide.png',
                ],
            ),
        );
    }
}
