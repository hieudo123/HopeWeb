<?php

namespace App\Repositories\Interfaces;

interface CountriesRepositoryInterface
{
	public function getAll();

    public function getById($id);
    public function update($id,$request);
    public function delete($id);
    public function create($request);
}