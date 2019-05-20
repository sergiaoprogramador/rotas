<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return "<h1>Seja bem vindo!</h1>";
});

Route::get('/ola/sejabemvindo', function () {
    return view('welcome');
});

Route::get('/nome/{nome}/{sobrenome}', function ($nome, $sn) {
    return "<h1>Ola, $nome $sn!</h1>";
});

Route::get('/repetir/{nome}/{n}', function ($nome, $n) {
    if (is_integer($n)) {
        for($i = 0; $i < $n; $i++) {
            echo "<h1>Ola, $nome!</h1>";
        }
    } else {
        echo "Voce não digitou um  inteiro";
    }
});

Route::get('/seunomecomregra/{nome}/{n}', function($nome, $n) {
    for($i = 0; $i < $n; $i++) {
        echo "<h1>Ola, $nome! ($i)</h1>";
    }
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/seunomesemregra/{nome?}', function($nome = null) {
    if(isset($nome)) {
        echo "<h1>Ola, $nome!</h1>";
    } else {
        echo "Voce não passou nenhum nome";
    }
});

Route::prefix('app')->group(function() {

    Route::get('/', function() {
        return "Página principal do APP";
    });

    Route::get("profile", function() {
        return "Página profile";
    });

    Route::get("about", function() {
        return "Meu about";
    });
});