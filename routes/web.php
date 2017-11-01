<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	//TODO: fix this mess, it's broken


	$players = ['Red', 'Blue'];
   	$rows = 6;
    $columns = 7;

	$turn = 5;
	$currentPlayer = $players[$turn % 2];
	$board = [];
	for ($r=0; $r < $rows; $r++) {
		for ($c = 0; $c < $columns; $c++) {
			$board[$r][$c] = '';
		}
	}

    return view('board', compact('currentPlayer', 'board', 'rows', 'columns', 'turn')
		);
})->name('board');



Route::get('game/{id}', function($id) {

	$game = \App\Game::find($id);
	$turn = $game->turn;
	$rows = $game->rows;
	$columns = $game->columns;


	$currentPlayer = $game->players[$turn % 2];
	$board = [];
	for ($r=0; $r < $rows; $r++) {
		for ($c = 0; $c < $columns; $c++) {
			$board[$r][$c] = '';
		}
	}

    return view('board', compact('currentPlayer', 'board', 'rows', 'columns', 'turn')
		);

	

})->name('game');



Route::get('/restart', function() {

	// TODO: End the old game
	// ??? set in_progress to false ???


	// Make a game
	$game = new \App\Game;
	$game->save();

	$id = $game->id;


	// Show the board
	return redirect()->route('game', ['id' => $id]);

});