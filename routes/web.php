<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserScoreController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota - página da liga
Route::get('/liga', [LeagueController::class, 'show'])->name('liga.index');

// Rota para exibir o formulário de cadastro de usuário
Route::get('/register', [UserController::class, 'create'])->name('register');

// Rota para processar o cadastro de usuário
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Rota para exibir o formulário de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota para processar o login
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

// Rota para logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rota para o painel administrativo
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', AdminMiddleware::class]) // Autenticado e deve ser administrador
    ->name('admin.dashboard');

// Rota para registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::get('/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth']) // Apenas usuários autenticados
    ->name('pages.dashboard');

// Rota para listar todos os usuários
Route::get('/admin/users', [AdminController::class, 'index'])
    ->middleware('auth', AdminMiddleware::class)
    ->name('admin.users');

// Rota para atualizar o status de jogador de um usuário
Route::post('/admin/users/{user}/toggle-player', [AdminController::class, 'togglePlayerStatus'])
    ->middleware(['auth'])
    ->name('admin.users.togglePlayer');

// Rota para exibir a lista de jogadores da liga
Route::get('/admin/players', [AdminController::class, 'listPlayers'])
    ->middleware(['auth'])
    ->name('admin.players.list');

// Rota para exibir o formulário de adicionar regras a um jogador
Route::get('/admin/players/{player}/add-rule', [AdminController::class, 'showAddRuleForm'])
    ->middleware(['auth'])
    ->name('admin.players.addRulesForm');

// Rota para adicionar uma regra a um jogador
Route::post('/admin/players/{player}/add-rule', [AdminController::class, 'addRule'])
    ->middleware(['auth'])
    ->name('admin.players.addRule');

// Rota para processar a adição de pontos
Route::post('/admin/players/{player}/add-points', [AdminController::class, 'addRuleToPlayer'])
    ->middleware(['auth'])
    ->name('admin.players.addPoints');

// Rota para processar a adição de pontos
Route::post('/admin/players/{player}/add-rule', [AdminController::class, 'addRule'])->name('admin.players.addRule');

// Rota para processar a remoção de pontos
Route::delete('/players/{player}/rules/{rule}', [PlayerController::class, 'removeRule'])->name('admin.players.removeRule');

// Rota para acessar a página de Scores
Route::get('/dashboard/scores', [UserScoreController::class, 'showScores'])
    ->middleware(['auth']) // Apenas usuários autenticados
    ->name('pages.user.scores');

// Rota para acessar as regras
Route::get('/regras', [RuleController::class, 'index'])->name('pages.rules.index');

// Rota para atualizar o Usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'show'])->name('user.profile.show');
    Route::put('/profile', [UserController::class, 'update'])->name('user.profile.update');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Rotas para o gerenciamento de regras
    Route::get('/admin/rules', [RuleController::class, 'indexAdmin'])->name('admin.rules.list');
    Route::get('/admin/rules/create', [RuleController::class, 'create'])->name('admin.rules.create');
    Route::post('/admin/rules', [RuleController::class, 'store'])->name('admin.rules.store');
    Route::get('/admin/rules/{rule}/edit', [RuleController::class, 'edit'])->name('admin.rules.edit');
    Route::put('/admin/rules/{rule}', [RuleController::class, 'update'])->name('admin.rules.update');
    Route::delete('/admin/rules/{rule}', [RuleController::class, 'destroy'])->name('admin.rules.destroy');
});
