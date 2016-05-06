<?php

class Order extends BaseModel
{
	protected $table = 'orders';

	public static $rules = array(
        'delivery' => 'required'
	);

    public function products()
    {
        return $this->belongsToMany('Product');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function orderProducts()
    {
        return $this->hasMany('OrderProduct');
    }

    public function deliveryMethod()
    {
        return $this->belongsTo('DeliveryMethod');
    }

    public function queryProducts()
    {
        $orderProducts = OrderProduct::with('product')->where('order_id', $this->id)->get();

        return $orderProducts;
    }

    public function makeDescription()
    {
        // Assemble order description
        $description = "";

        foreach($this->order_products as $key => $order_product)
        {
            $product = $order_product->product;

            if($key < (count($this->order_products) - 1))
            {
                if((preg_match('/basket/i', $product->name) == 1) && ($order_product->amount > 1))
                {
                    $description .= "{$order_product->amount} {$product->name}s, ";
                }
                else if((preg_match('/eggs/i', $product->name) == 1))
                {
                    $description .= "{$order_product->amount} Dozen {$product->name}, ";
                }
                else
                {
                    $description .= "{$order_product->amount} {$product->name}, ";
                }
            }
            else
            {
                if((preg_match('/basket/i', $product->name) == 1) && ($order_product->amount > 1))
                {
                    $description .= "{$order_product->amount} {$product->name}s";
                }
                else if((preg_match('/eggs/i', $product->name) == 1))
                {
                    $description .= "{$order_product->amount} Dozen {$product->name}";
                }
                else
                {
                    $description .= "{$order_product->amount} {$product->name}";
                }
            }
        }

        return $description;
    }

    public function prePay($token)
	{
        // Get order description
        $description = $this->makeDescription();

		// Create the charge on Stripe's servers - this will charge the user's card
		$charge = Stripe::charges()->create(array(
		    "amount" => $this->total,
		    "currency" => "USD",
		    "source" => $token,
		    "description" => $description
	    ));

        $this->prepaid = true;
	}

    public function isVerified()
    {
        if($this->delivery_method_id == 1 && !$this->prepaid)
        {
            return false;
        }
        else if($this->delivery_method_id == 1 && $this->prepaid)
        {
            return true;
        }

        return true;
    }
}
