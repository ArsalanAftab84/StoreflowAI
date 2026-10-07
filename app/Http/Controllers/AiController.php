<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AiController extends Controller
{
    public function chat(Request $request)
    {
        $message = $request->input('message');
        
        $lowercaseMsg = strtolower($message);
        
        if (str_contains($lowercaseMsg, 'shipping') || str_contains($lowercaseMsg, 'track')) {
            $response = "Our typical shipping time is 2-3 business days. You will receive a tracking link via email once your order ships!";
        } elseif (str_contains($lowercaseMsg, 'return') || str_contains($lowercaseMsg, 'refund')) {
            $response = "We offer a 30-day hassle-free return policy. If you're not satisfied, just let us know and we'll process a full refund.";
        } elseif (str_contains($lowercaseMsg, 'hello') || str_contains($lowercaseMsg, 'hi')) {
            $response = "Hello there! I'm your Storeflow AI assistant. How can I help you find the perfect product today?";
        } else {
            $response = "That's a great question! I'm currently an AI placeholder. To integrate me fully with OpenAI, we can hook up your API key into the AiController!";
        }

        usleep(800000); 

        return response()->json([
            'reply' => $response
        ]);
    }
}
