<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Logique pour ajouter l'article au panier
        $itemName = $request->input('article_name');
        $itemPrice = $request->input('article_price');
        $quantity = $request->input('quantity');

        // Ajoutez ici votre logique pour gérer le panier
        // ...

        return redirect()->back()->with('success', 'Article ajouté au panier!');
    }
}
