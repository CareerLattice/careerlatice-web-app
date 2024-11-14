<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;
use App\Models\UserSkill;
Use App\Models\User;

class SkillController extends Controller
{
    public function index(){
        $skills = Skill::all();
        return response()->json($skills);
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $skill = new Skill([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $skill->save();
        return response()->json($skill, 201);
    }

    public function show($name){
        $skill = Skill::where('name', $name)->first();

        // Apabila skill tidak ditemukan, maka buat skill baru
        if($skill === null){
            $request = new Request([
                'name' => $name,
            ]);
            $this->store($request);
            return $this->show($name);
        }
        return response()->json($skill);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->name = $request->name;
        $skill->description = $request->description;
        $skill->save();
        return response()->json($skill);
    }

    public function destroy($id){
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return response()->json(null, 204);
    }
}
