<?php

class DeliveryMethodTableSeeder extends Seeder
{
    public function run()
    {
        // $deliveryMethod = new DeliveryMethod();
        // $deliveryMethod->method = "Home Delivery";
        // $deliveryMethod->save();

        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->method = "St. Pius X, 3907 Harry Wurzbach, Sunday 9:30-10:30am";
        $deliveryMethod->save();

        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->method = "Nite Market, 418 La Villita, Tuesday 6:00-8:00pm";
        $deliveryMethod->save();
    }
}
