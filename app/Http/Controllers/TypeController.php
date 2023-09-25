<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function create()
    {
        return view('admin.types.form', ['data' => null]);
    }

    public function store(TypeRequest $request)
    {
        $type = new Type();
        $type->fill($request->validated());
        $type->save();

        return redirect()->route('listType')
            ->with('success', 'Thêm mới thành công.');
    }

    public function list(Request $request)
    {
        $queryBuilder = Type::query();
        $search = $request->get('search');
        $sort = (int) $request->get('sort');
        if ($search || strlen($search) > 0) {
            $queryBuilder = $queryBuilder->where('name', 'like', '%' . $search . '%');
        }
        if ($sort === 1) {
            $queryBuilder = $queryBuilder->orderBy('created_at', 'DESC');
        }
        if ($sort === 2) {
            $queryBuilder = $queryBuilder->orderBy('created_at', 'ASC');
        }
        $data = $queryBuilder->orderBy('created_at','DESC')->paginate(10)->appends(['search' => $search]);

        return view('admin.types.table', [
            'types' => $data,
            'sort' => $sort
        ]);
    }

    public function edit($id)
    {
        $types = Type::find($id);
        return view('admin.types.form', ['data' => $types]);
    }

    public function save(TypeRequest $request, $id)
    {
        $request->validated();
        $type = Type::find($id);
        $type->image = $request->image;
        $type->name = $request->name;
        $type->save();

        return redirect()->route('listType')
            ->with('success', 'Update thành công.');
    }

    public function delete($id)
    {
        $delete = Type::find($id);
        $delete->delete();
        return redirect()->route('listType')
            ->with('success', 'Delete thành công.');
    }
}
