<?php

// Remove the 'use DB;' line

function getAllMenu()
{
    return DB::table('menus')->where('isDeleted','N')->orderBy('position', 'asc')->get();
}

function getSubmenuById($id)
{
    return DB::table('submenus')->where('isDeleted','N')->where('cat_name', $id)->get();
}

