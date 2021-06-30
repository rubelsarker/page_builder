<?php

if (!function_exists('menu')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function menu($name)
    {
        $menu = \App\Models\Menu::where('title',$name)->first();
        return $menu->items;

    }
}
