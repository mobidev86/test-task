<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function insertRecord()
    {
        User::query()->truncate();
        $names = array(
            "Harry", "Ross",
            "Bruce", "Cook",
            "Carolyn", "Morgan",
            "Albert", "Walker",
            "Randy", "Reed",
            "Larry", "Barnes",
            "Lois", "Wilson",
            "Jesse", "Campbell",
            "Ernest", "Rogers",
            "Theresa", "Patterson",
            "Henry", "Simmons",
            "Michelle", "Perry",
            "Frank", "Butler",
            "Shirley", "Brooks",
            "Rachel", "Edwards",
            "Christopher", "Perez",
            "Thomas", "Baker",
            "Sara", "Moore",
            "Chris", "Bailey",
            "Roger", "Johnson",
            "Marilyn", "Thompson",
            "Anthony", "Evans",
            "Julie", "Hall",
            "Paula", "Phillips",
            "Annie", "Hernandez",
            "Dorothy", "Murphy",
            "Alice", "Howard", "Ruth", "Jackson",
            "Debra", "Allen",
            "Gerald", "Harris",
            "Raymond", "Carter",
            "Jacqueline", "Torres",
            "Joseph", "Nelson",
            "Carlos", "Sanchez",
            "Ralph", "Clark",
            "Jean", "Alexander",
            "Stephen", "Roberts",
            "Eric", "Long",
            "Amanda", "Scott",
            "Teresa", "Diaz",
            "Wanda", "Jonas"
        );

        foreach ($names as $key => $value) {
            $data = [
                'username' => strtolower($value),
                'first_name' => $value,
                'last_name' => isset($names[$key + 1]) ? $names[$key + 1] : 'test',
                'avatar_url' => 'https://prnt.sc/IxPHcB6NkTFJ',
                'gender' => 'Male',
                'email' => strtolower($value) . '@gmail.com',
                'password' => Hash::make('12345678'),
                'language' => 'English',
                'country' => 'India',
                'timezone' => 'UTC',
                'avatar' => 'https://prnt.sc/IxPHcB6NkTFJ',
                'card_last_four' => rand(pow(10, 4 - 1), pow(10, 4) - 1)
            ];
            User::create($data);
        }
        echo "Insert Successfully";
        exit;
    }

    public function index(Request $request)
    {
        $users = User::query();
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            $users->where('username', 'like', '%' . trim($_GET['username']) . '%');
        }
        if (isset($_GET['first_name']) && !empty($_GET['first_name'])) {
            $users->where('first_name', 'like', '%' . trim($_GET['first_name']) . '%');
        }
        if (isset($_GET['last_name']) && !empty($_GET['last_name'])) {
            $users->where('last_name', 'like', '%' . trim($_GET['last_name']) . '%');
        }
        if (isset($_GET['email']) && !empty($_GET['email'])) {
            $users->where('email', 'like', '%' . trim($_GET['email']) . '%');
        }
        if (isset($_GET['gender']) && !empty($_GET['gender'])) {
            $users->where('gender', 'like', '%' . trim($_GET['gender']) . '%');
        }
        if (isset($_GET['language']) && !empty($_GET['language'])) {
            $users->where('language', 'like', '%' . trim($_GET['language']) . '%');
        }
        if (isset($_GET['country']) && !empty($_GET['country'])) {
            $users->where('country', 'like', '%' . trim($_GET['country']) . '%');
        }
        if (isset($_GET['card_last_four']) && !empty($_GET['card_last_four'])) {
            $users->where('card_last_four', 'like', '%' . trim($_GET['card_last_four']) . '%');
        }
        $users = $users->get();

        return view('users.index', compact('users'));
    }
}
