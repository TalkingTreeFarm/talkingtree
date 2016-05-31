Hello Talking Tree Farm!

{{{$first}}} {{{$last}}} at {{{$email}}} completed order #{{{$order->id}}}
on {{{$order->created_at}}}.
This order includes {{{$order->makeDescription()}}} for a total of ${{{$order->total}}}.
The delivery method is the following {{{ $order->delivery_method->method }}}, and there is {{{$order->prepaid}}} prepaid.
