<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use stdClass;



class MemberController extends Controller
{
    public $data = [
        [
            'Id' => 1,
            'CreatedDate' => '2024-01-01 10:00:00',
            'Name' => 'John Doe',
            'ParentId' => null,
        ],
        [
            'Id' => 2,
            'CreatedDate' => '2024-01-01 11:00:00',
            'Name' => 'Jane Doe',
            'ParentId' => 1,
        ],
        [
            'Id' => 3,
            'CreatedDate' => '2024-01-01 12:00:00',
            'Name' => 'Jim Smith',
            'ParentId' => 1,
        ],
        [
            'Id' => 4,
            'CreatedDate' => '2024-01-01 13:00:00',
            'Name' => 'Jessica Jones',
            'ParentId' => 2,
        ],
        [
            'Id' => 5,
            'CreatedDate' => '2024-01-01 14:00:00',
            'Name' => 'Jack Brown',
            'ParentId' => 2,
        ],
        [
            'Id' => 6,
            'CreatedDate' => '2024-01-01 15:00:00',
            'Name' => 'Julie White',
            'ParentId' => 3,
        ],
        [
            'Id' => 7,
            'CreatedDate' => '2024-01-01 16:00:00',
            'Name' => 'Jason Black',
            'ParentId' => 3,
        ],
        [
            'Id' => 8,
            'CreatedDate' => '2024-01-01 17:00:00',
            'Name' => 'Jill Green',
            'ParentId' => 4,
        ],
        [
            'Id' => 9,
            'CreatedDate' => '2024-01-01 18:00:00',
            'Name' => 'Joe Blue',
            'ParentId' => 5,
        ],
        [
            'Id' => 10,
            'CreatedDate' => '2024-01-01 19:00:00',
            'Name' => 'Janet Yellow',
            'ParentId' => 6,
        ],
    ];
    public function index()
    {
        $members = Member::all();
        $tree = $this->buildTree($members);
        return view('members.index', ['tree' => $tree, 'members' => $members]);

        $datadd = [
            [
                'Id' => 1,
                'CreatedDate' => '2024-01-01 10:00:00',
                'Name' => 'John Doe',
                'ParentId' => null,
            ],
            [
                'Id' => 2,
                'CreatedDate' => '2024-01-01 11:00:00',
                'Name' => 'Jane Doe',
                'ParentId' => 1,
            ],
            [
                'Id' => 3,
                'CreatedDate' => '2024-01-01 12:00:00',
                'Name' => 'Jim Smith',
                'ParentId' => 1,
            ],
            [
                'Id' => 4,
                'CreatedDate' => '2024-01-01 13:00:00',
                'Name' => 'Jessica Jones',
                'ParentId' => 2,
            ],
            [
                'Id' => 5,
                'CreatedDate' => '2024-01-01 14:00:00',
                'Name' => 'Jack Brown',
                'ParentId' => 2,
            ],
            [
                'Id' => 6,
                'CreatedDate' => '2024-01-01 15:00:00',
                'Name' => 'Julie White',
                'ParentId' => 3,
            ],
            [
                'Id' => 7,
                'CreatedDate' => '2024-01-01 16:00:00',
                'Name' => 'Jason Black',
                'ParentId' => 3,
            ],
            [
                'Id' => 8,
                'CreatedDate' => '2024-01-01 17:00:00',
                'Name' => 'Jill Green',
                'ParentId' => 4,
            ],
            [
                'Id' => 9,
                'CreatedDate' => '2024-01-01 18:00:00',
                'Name' => 'Joe Blue',
                'ParentId' => 5,
            ],
            [
                'Id' => 10,
                'CreatedDate' => '2024-01-01 19:00:00',
                'Name' => 'Janet Yellow',
                'ParentId' => 6,
            ],
        ];
        
        $tree = [];
        foreach ($this->data as $item) {
            $obj = new stdClass();
            $obj->Id = $item['Id'];
            $obj->CreatedDate = $item['CreatedDate'];
            $obj->Name = $item['Name'];
            $obj->ParentId = $item['ParentId'];
            
            $tree[] = $obj;
        }
        $datadd = $tree;
        $tree = $this->buildTree($tree);
        return view('members.index', ['tree' => $tree, 'members' => $members]);
    }

    private function buildTree($members, $parentId = null)
    {
        $branch = [];

        foreach ($members as $member) {
            if ($member->ParentId == $parentId) {
                $children = $this->buildTree($members, $member->Id);
                if ($children) {
                    $member->children = $children;
                }
                $branch[] = $member;
            }
        }

        return $branch;
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'parent_id' => 'nullable|exists:members,id', // Ensure parent_id exists in members table
            'name' => 'required|string|max:50', // Validate name field
        ]);

        // Create a new Member instance
        $member = new Member();
        $member->CreatedDate = date('Y-m-d H:i:s');
        $member->ParentId = $request->input('parent_id');
        $member->Name = $request->input('name');
        // Optionally, you can set other fields as needed

        // Save the member to the database
        $member->save();


        $newArray  = [
            'Id' => count($this->data) + 1,
            'CreatedDate' => '2024-01-01 18:00:00',
            'Name' => $request->input('name'),
            'ParentId' => $request->input('parent_id'),
        ];
        $this->data = array_merge($this->data, $newArray);
        // Return a response (you can customize this as per your application's needs)
        return response()->json(['message' => 'Member added successfully'], 200);
    }
}
