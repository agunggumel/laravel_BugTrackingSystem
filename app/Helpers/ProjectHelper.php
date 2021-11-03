<?php

if (! function_exists('getProjects')) {
    function getProjects() {
        $user = DB::table('projects')->limit(5)->get();
        return $user;
    }
}