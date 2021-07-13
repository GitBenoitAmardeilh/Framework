<?php

Route::get("/", [Home::class, "index"]);
Route::get("accueil", [Home::class, "accueil"]);
Route::get("oups", [Home::class, "accueil"]);