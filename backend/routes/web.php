<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SessionQuizController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\ChoixController;
use App\Http\Controllers\StatistiqueController;

// -------------------- MODULES --------------------
Route::get('/api/module', [ModuleController::class, 'index']);
Route::get('/api/module/{id}', [ModuleController::class, 'show']);
Route::post('/api/module', [ModuleController::class, 'store']);
Route::put('/api/module/{id}', [ModuleController::class, 'update']);
Route::delete('/api/module/{id}', [ModuleController::class, 'destroy']);

// -------------------- PROFESSEURS --------------------
Route::get('/api/professeur', [ProfesseurController::class, 'index']);
Route::get('/api/professeur/{id}', [ProfesseurController::class, 'show']);
Route::post('/api/professeur', [ProfesseurController::class, 'store']);
Route::put('/api/professeur/{id}', [ProfesseurController::class, 'update']);
Route::delete('/api/professeur/{id}', [ProfesseurController::class, 'destroy']);

// -------------------- GROUPES --------------------
Route::get('/api/groupe', [GroupeController::class, 'index']);
Route::get('/api/groupe/{id}', [GroupeController::class, 'show']);
Route::post('/api/groupe', [GroupeController::class, 'store']);
Route::put('/api/groupe/{id}', [GroupeController::class, 'update']);
Route::delete('/api/groupe/{id}', [GroupeController::class, 'destroy']);

// -------------------- ETUDIANTS --------------------
Route::get('/api/etudiant', [EtudiantController::class, 'index']);
Route::get('/api/etudiant/{id}', [EtudiantController::class, 'show']);
Route::post('/api/etudiant', [EtudiantController::class, 'store']);
Route::put('/api/etudiant/{id}', [EtudiantController::class, 'update']);
Route::delete('/api/etudiant/{id}', [EtudiantController::class, 'destroy']);

// -------------------- QUIZZES --------------------
Route::get('/api/quiz', [QuizController::class, 'index']);
Route::get('/api/quiz/{id}', [QuizController::class, 'show']);
Route::post('/api/quiz', [QuizController::class, 'store']);
Route::put('/api/quiz/{id}', [QuizController::class, 'update']);
Route::delete('/api/quiz/{id}', [QuizController::class, 'destroy']);

// -------------------- QUESTIONS --------------------
Route::get('/api/question', [QuestionController::class, 'index'])->name('question.index');
Route::get('/api/question/{id}/edit', [QuestionController::class, 'edit'])->name('question.edit');
Route::put('/api/question/{id}', [QuestionController::class, 'update'])->name('question.update');
Route::delete('/api/question/{id}', [QuestionController::class, 'destroy'])->name('question.destroy');

// -------------------- SESSION QUIZZES --------------------
Route::get('/api/session-quiz', [SessionQuizController::class, 'index']);
Route::get('/api/session-quiz/{id}', [SessionQuizController::class, 'show']);
Route::post('/api/session-quiz', [SessionQuizController::class, 'store']);
Route::put('/api/session-quiz/{id}', [SessionQuizController::class, 'update']);
Route::delete('/api/session-quiz/{id}', [SessionQuizController::class, 'destroy']);

// -------------------- RESULTATS --------------------
Route::get('/api/resultat', [ResultatController::class, 'index'])->name('resultat.index');
Route::get('/api/resultat/{id}/edit', [ResultatController::class, 'edit'])->name('resultat.edit');
Route::put('/api/resultat/{id}', [ResultatController::class, 'update'])->name('resultat.update');
Route::delete('/api/resultat/{id}', [ResultatController::class, 'destroy'])->name('resultat.destroy');

// -------------------- CHOIX --------------------
Route::get('/api/choix', [ChoixController::class, 'index'])->name('choix.index');
Route::get('/api/choix/{id}', [ChoixController::class, 'show']);
Route::get('/choix/{id}/edit', [ChoixController::class, 'edit'])->name('choix.edit');
Route::post('/api/choix', [ChoixController::class, 'store']);
Route::put('/api/choix/{id}', [ChoixController::class, 'update'])->name('choix.update');
Route::delete('/api/choix/{id}', [ChoixController::class, 'destroy'])->name('choix.destroy');

// -------------------- STATISTIQUES --------------------
Route::get('/api/statistique', [StatistiqueController::class, 'index']);
Route::get('/api/statistique/{id}', [StatistiqueController::class, 'show']);
Route::post('/api/statistique', [StatistiqueController::class, 'store']);
Route::put('/api/statistique/{id}', [StatistiqueController::class, 'update']);
Route::delete('/api/statistique/{id}', [StatistiqueController::class, 'destroy']);
