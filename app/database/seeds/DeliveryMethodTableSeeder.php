<?php

class DeliveryMethodTableSeeder extends Seeder
{
    public function run()
    {
        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->method = "Home Delivery";
        $deliveryMethod->save();

        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->method = "Pickup - St. Pius X";
        $deliveryMethod->save();

        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->method = "Pickup - Nite Market at La Villita";
        $deliveryMethod->save();
    }
}
