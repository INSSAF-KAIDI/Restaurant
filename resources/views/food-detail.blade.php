@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $item->name }}</h1>
    <p>{{ $item->description }}</p>
    <form action="{{ route('add_to_cart') }}" method="POST">
        @csrf
        <input type="hidden" name="item_name" value="{{ $item->name }}">
        <input type="hidden" name="item_price" value="{{ $item->price }}">

        <!-- Section des tailles -->
        <div class="food-size">
            <h3>Choisissez la taille</h3>
            <label>
                <input type="radio" name="size" value="junior" required> Junior
            </label>
            <label>
                <input type="radio" name="size" value="senior"> Senior
            </label>
            <label>
                <input type="radio" name="size" value="mega"> Mega
            </label>
        </div>

        <!-- Section des ingrédients supplémentaires -->
        <div class="additional-ingredients">
            <h3>Ingrédients supplémentaires</h3>
            @foreach($additionalIngredients as $ingredient)
                <label>
                    <input type="checkbox" name="additional_ingredients[]" value="{{ $ingredient }}"> {{ $ingredient }}
                </label>
            @endforeach
        </div>

        <!-- Bouton pour ajouter au panier -->
        <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
    </form>
</div>

<!-- Ajoutez la section de style ici -->
<style>
    .food-size, .additional-ingredients {
        margin-bottom: 20px;
    }

    .add-to-cart-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    .add-to-cart-btn:hover {
        background-color: #218838;
    }
</style>
@endsection

