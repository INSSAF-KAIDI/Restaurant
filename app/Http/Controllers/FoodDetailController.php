<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class FoodDetailController extends Controller
{
    public function show($id)
    {
        $item = MenuItem::find($id);

        if (!$item) {
            return redirect()->route('homepage')->with('error', 'Article non trouvé.');
        }

        $additionalIngredients = ['Olives', 'Extra cheese', 'Mushrooms', 'Pepperoni'];

        return view('food-detail', compact('item', 'additionalIngredients'));
    }

    public function addToCart(Request $request)
    {
        // Logique pour ajouter l'article au panier
        // Stockez ces informations dans la session ou une table de panier dans la base de données
        return redirect()->route('homepage')->with('success', 'Article ajouté au panier!');
    }
}
