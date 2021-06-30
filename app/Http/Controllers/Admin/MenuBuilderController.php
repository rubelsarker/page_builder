<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuBuilderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = Menu::all();
        return view('menuBuilder.index',compact('data'));
    }
    public function builder($id){
        $menu = Menu::find($id);
        $menuItems = MenuItem::where('parent_id',null)->get();
        return view('menuBuilder.builder',compact('menu','menuItems'));
    }
    public function store(Request $request){

        $data = [
          'menu_id'=>$request->menu_id,
          'label'=>$request->label,
          'parent_id'=>$request->parent,
          'url'=>$request->url,
        ];
        MenuItem::create($data);
        return redirect()->back()->with('success','Menu Item Created Successfully');
    }
    public function order(Request $request, $id){
        $menuItemOrder = json_decode($request->input('order'));
        $this->orderMenu($menuItemOrder, null);
    }

    private function orderMenu(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $menuItem) {
            $item = MenuItem::findOrFail($menuItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();
            if (isset($menuItem->children)) {
                $this->orderMenu($menuItem->children, $item->id);
            }
        }
    }
}
