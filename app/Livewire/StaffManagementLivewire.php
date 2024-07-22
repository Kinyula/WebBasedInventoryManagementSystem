<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class StaffManagementLivewire extends Component
{
    public $role_id, $username, $email, $password, $post, $college, $profile_image, $department;
    public $departments = [];

    public function mount(){

        $this->password = time();


    }

    public function updatedCollege($value)
    {
        $this->departments = $this->getDepartmentsByCollege($value);
    }

    private function getDepartmentsByCollege($college)
    {
        $departments = [
            'College of Informatics and Virtual Education ( CIVE )' => ['Electronics and Telecommunications Engineering ( ETE )', 'Computer Science and Engineering ( CSE )', 'Informartion Systems and Technology ( IST )'],
            'College of Natural Mathematical Science ( CNMS )' => ['Department Of Mathematics', 'Department Of Physics', 'Department Of Chemistry', 'Department Of Biology', 'Department Of Geography'],
            'College of Health and Allied Science ( CHAS )' => ['Department 1', 'Department 2','Department 3', 'Department 4','Department 5'],
            'College of Education ( CoED )' => ['Department 7', 'Department 8'],
            'College of Humanities and Social Science ( CHSS )' => ['Department 9', 'Department 10'],
            'College of Business and Economics ( CoBE )' => ['Department 11', 'Department 12'],
            'College of Earth Sciences and Engineering ( CoESE )' => ['Department 13', 'Department 14'],
        ];

        return $departments[$college] ?? [];
    }


    public function render()
    {
        return view('livewire.staff-management-livewire');
    }


    public function addStaffs()
    {

        $this->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'post' => 'required',

        ]);


        $staff = new User();

        $staff->username = $this->username;

        $staff->email = $this->email;

        $staff->department = $this->department;


        if (!is_null($this->college)) {
            $staff->college_name = $this->college;
        } else {
            $staff->college_name = 'Not set';
        }



        $staff->post = $this->post;

        $staff->password = Hash::make($this->password);

        $staff->role_id = $this->role_id;

        if (!is_null($this->profile_image)) {
            $profile_image = $this->profile_image->store('public/profile_images');

            $profile_image = explode('/', $profile_image);
            $profile_image = $profile_image[2];

            $staff->profile_image = $profile_image;
        } else {
            $staff->profile_image = 'user3.png';
        }


        $staff->save();

        $this->reset(['email', 'profile_image', 'username', 'password', 'post', 'college', 'role_id']);

        session()->flash('addStaff', 'A staff is added successfully.');
    }

}
