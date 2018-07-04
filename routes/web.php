<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    $this->get('depositar', 'BalanceController@depositar')->name('balance.depositar');
    $this->post('deposit', 'BalanceController@depositStore')->name('deposit.store');
    $this->get('balance', 'BalanceController@index')->name('admin.balance');

    $this->get('/', 'AdminController@index')->name('admin.home');
});

$this->get('/', 'Site\SiteController@index');

Auth::routes();


