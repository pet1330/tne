<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entries = collect([
            ['programme_id' => '1', 'name' => 'Algorithms and Complexity'],
            ['programme_id' => '1', 'name' => 'Computer Architectures'],
            ['programme_id' => '1', 'name' => 'Maths for Computing'],
            ['programme_id' => '1', 'name' => 'Operating Systems'],
            ['programme_id' => '1', 'name' => 'Problem Solving'],
            ['programme_id' => '1', 'name' => 'Programming and Data Structures'],
            ['programme_id' => '1', 'name' => 'Web Authoring'],
            ['programme_id' => '1', 'name' => 'Artificial Intelligence'],
            ['programme_id' => '1', 'name' => 'Database Systems'],
            ['programme_id' => '1', 'name' => 'Group Project'],
            ['programme_id' => '1', 'name' => 'Human-Computer Interaction'],
            ['programme_id' => '1', 'name' => 'Networks and Network Systems'],
            ['programme_id' => '1', 'name' => 'Object-Oriented Programming'],
            ['programme_id' => '1', 'name' => 'Professional Practice'],
            ['programme_id' => '1', 'name' => 'Programming Paradigms'],
            ['programme_id' => '1', 'name' => 'Autonomous Mobile Robotics'],
            ['programme_id' => '1', 'name' => 'Image Processing'],
            ['programme_id' => '1', 'name' => 'Parallel Computing'],
            ['programme_id' => '1', 'name' => 'Project'],
            ['programme_id' => '1', 'name' => 'Software Engineering'],
            ['programme_id' => '1', 'name' => 'Algorithms for Data Mining'],
            ['programme_id' => '1', 'name' => 'Business Intelligence'],
            ['programme_id' => '1', 'name' => 'Critical Perspectives on Project Management'],
            ['programme_id' => '1', 'name' => 'Cross-Platform Development'],
            ['programme_id' => '1', 'name' => 'Cyber Security in Society'],
            ['programme_id' => '1', 'name' => 'Data Science Tools and Techniques'],
            ['programme_id' => '1', 'name' => 'Entrepreneurship and Innovation 1'],
            ['programme_id' => '1', 'name' => 'Entrepreneurship and Innovation 2'],
            ['programme_id' => '1', 'name' => 'Mobile Computing'],
            ['programme_id' => '2', 'name' => 'Algorithms and Complexity'],
            ['programme_id' => '2', 'name' => 'Computer Architectures'],
            ['programme_id' => '2', 'name' => 'Game Design 1'],
            ['programme_id' => '2', 'name' => 'Introductory Games Studies'],
            ['programme_id' => '2', 'name' => 'Maths for Computing'],
            ['programme_id' => '2', 'name' => 'Programming and Data Structures'],
            ['programme_id' => '2', 'name' => 'Web Authoring'],
            ['programme_id' => '2', 'name' => 'Artificial Intelligence'],
            ['programme_id' => '2', 'name' => 'Game Design 2'],
            ['programme_id' => '2', 'name' => 'Games Programming'],
            ['programme_id' => '2', 'name' => 'Graphics'],
            ['programme_id' => '2', 'name' => 'Group Project'],
            ['programme_id' => '2', 'name' => 'Human-Computer Interaction'],
            ['programme_id' => '2', 'name' => 'Object-Oriented Programming'],
            ['programme_id' => '2', 'name' => 'Professional Practice'],
            ['programme_id' => '2', 'name' => 'Advanced Games Programming'],
            ['programme_id' => '2', 'name' => 'Advanced Games Studies'],
            ['programme_id' => '2', 'name' => 'Physics Simulation'],
            ['programme_id' => '2', 'name' => 'Procedural Content Generation'],
            ['programme_id' => '2', 'name' => 'Project'],
            ['programme_id' => '2', 'name' => 'Algorithms for Data Mining'],
            ['programme_id' => '2', 'name' => 'Autonomous Mobile Robotics'],
            ['programme_id' => '2', 'name' => 'Business Intelligence'],
            ['programme_id' => '2', 'name' => 'Critical Perspectives on Project Management'],
            ['programme_id' => '2', 'name' => 'Cross-Platform Development'],
            ['programme_id' => '2', 'name' => 'Cyber Security in Society'],
            ['programme_id' => '2', 'name' => 'Data Science Tools and Techniques'],
            ['programme_id' => '2', 'name' => 'Entrepreneurship and Innovation 1'],
            ['programme_id' => '2', 'name' => 'Entrepreneurship and Innovation 2'],
            ['programme_id' => '2', 'name' => 'Image Processing'],
            ['programme_id' => '2', 'name' => 'Mobile Computing'],
            ['programme_id' => '2', 'name' => 'Parallel Computing'],
            ['programme_id' => '2', 'name' => 'Software Engineering'],
            ['programme_id' => '3', 'name' => 'Algebra'],
            ['programme_id' => '3', 'name' => 'Algorithms and Complexity'],
            ['programme_id' => '3', 'name' => 'Calculus'],
            ['programme_id' => '3', 'name' => 'Linear Algebra'],
            ['programme_id' => '3', 'name' => 'Probability and Statistics'],
            ['programme_id' => '3', 'name' => 'Programming and Data Structures'],
            ['programme_id' => '3', 'name' => 'Web Authoring'],
            ['programme_id' => '3', 'name' => 'Artificial Intelligence'],
            ['programme_id' => '3', 'name' => 'Coding Theory'],
            ['programme_id' => '3', 'name' => 'Database Systems'],
            ['programme_id' => '3', 'name' => 'Differential Equations'],
            ['programme_id' => '3', 'name' => 'Group Project'],
            ['programme_id' => '3', 'name' => 'Industrial and Financial Mathematics'],
            ['programme_id' => '3', 'name' => 'Object-Oriented Programming'],
            ['programme_id' => '3', 'name' => 'Programming Paradigms'],
            ['programme_id' => '3', 'name' => 'Project'],
            ['programme_id' => '3', 'name' => 'Advanced Topics of Mathematics and Mathematics Seminar'],
            ['programme_id' => '3', 'name' => 'Autonomous Mobile Robotics'],
            ['programme_id' => '3', 'name' => 'Fluid Dynamics'],
            ['programme_id' => '3', 'name' => 'Group Theory'],
            ['programme_id' => '3', 'name' => 'Image Processing'],
            ['programme_id' => '3', 'name' => 'Mathematics Pedagogy'],
            ['programme_id' => '3', 'name' => 'Methods of Mathematical Physics'],
            ['programme_id' => '3', 'name' => 'Mobile Computing'],
            ['programme_id' => '3', 'name' => 'Numerical Methods'],
            ['programme_id' => '3', 'name' => 'Parallel Computing'],
            ['programme_id' => '3', 'name' => 'Software Engineering'],
            ['programme_id' => '3', 'name' => 'Tensor'],
            ['programme_id' => '4', 'name' => 'Programming Fundamentals'],
            ['programme_id' => '4', 'name' => 'Computer Architecture'],
            ['programme_id' => '4', 'name' => 'Fundamentals of Relational Database'],
            ['programme_id' => '4', 'name' => 'Discrete Mathematics'],
            ['programme_id' => '4', 'name' => 'System Analysis and Design'],
            ['programme_id' => '4', 'name' => 'Object-Oriented Programming'],
            ['programme_id' => '4', 'name' => 'Foundation of Human Computer Interaction'],
            ['programme_id' => '4', 'name' => 'Computer Networks'],
            ['programme_id' => '4', 'name' => 'Data Structures & Algorithms'],
            ['programme_id' => '4', 'name' => 'Program Design & Development'],
            ['programme_id' => '4', 'name' => 'Principles of Programming Languages'],
            ['programme_id' => '4', 'name' => 'Operating Systems and Concurrency'],
            ['programme_id' => '4', 'name' => 'Introduction to Web Design'],
            ['programme_id' => '4', 'name' => 'Introduction to Artificial Intelligence'],
            ['programme_id' => '4', 'name' => 'Writing and Referencing '],
            ['programme_id' => '4', 'name' => 'Database Programming'],
            ['programme_id' => '4', 'name' => 'Elective 1'],
            ['programme_id' => '4', 'name' => 'Elective 2'],
            ['programme_id' => '4', 'name' => 'Server-Side Web Technologies'],
            ['programme_id' => '4', 'name' => 'Intelligent Systems'],
            ['programme_id' => '4', 'name' => 'Public Speaking'],
            ['programme_id' => '4', 'name' => 'Elective 3'],
            ['programme_id' => '4', 'name' => 'Individual Project 1'],
            ['programme_id' => '4', 'name' => 'Computer Graphics'],
            ['programme_id' => '4', 'name' => 'Web Application Integration 1'],
            ['programme_id' => '4', 'name' => 'Image Processing'],
            ['programme_id' => '4', 'name' => 'Software Engineering'],
            ['programme_id' => '4', 'name' => 'Individual Project 2'],
            ['programme_id' => '4', 'name' => 'Social and Current issues in Computing'],
            ['programme_id' => '4', 'name' => 'Web Application Integration 2'],
            ['programme_id' => '4', 'name' => 'Autonomous Mobile Robotics'],
            ['programme_id' => '4', 'name' => 'Parallel Computing'],
            ['programme_id' => '4', 'name' => 'Industrial Training'],
            ['programme_id' => '4', 'name' => 'Programming Fundamentals'],
            ['programme_id' => '4', 'name' => 'Computer Architecture'],
            ['programme_id' => '4', 'name' => 'Fundamentals of Relational Database'],
            ['programme_id' => '4', 'name' => 'Discrete Mathematics'],
            ['programme_id' => '4', 'name' => 'System Analysis and Design'],
            ['programme_id' => '4', 'name' => 'Object-Oriented Programming'],
            ['programme_id' => '4', 'name' => 'Foundation of Human Computer Interaction'],
            ['programme_id' => '4', 'name' => 'Computer Networks'],
            ['programme_id' => '4', 'name' => 'Data Structures & Algorithms'],
            ['programme_id' => '4', 'name' => 'Simulation for Game Dynamics'],
            ['programme_id' => '4', 'name' => 'Game Asset Construction'],
            ['programme_id' => '4', 'name' => 'Operating Systems and Concurrency'],
            ['programme_id' => '4', 'name' => 'Computer Games Design'],
            ['programme_id' => '4', 'name' => 'Introduction to Artificial Intelligence'],
            ['programme_id' => '4', 'name' => 'Network Programming with UNIX'],
            ['programme_id' => '4', 'name' => 'Professional Software Engineering Practice'],
            ['programme_id' => '4', 'name' => 'Elective 1'],
            ['programme_id' => '4', 'name' => '3D Graphics Programming'],
            ['programme_id' => '4', 'name' => 'Intelligent Systems'],
            ['programme_id' => '4', 'name' => 'Writing and Referencing'],
            ['programme_id' => '4', 'name' => 'Elective 2'],
            ['programme_id' => '4', 'name' => 'Public Speaking'],
            ['programme_id' => '4', 'name' => 'Multimedia and Game Animation'],
            ['programme_id' => '4', 'name' => 'Individual Project 1'],
            ['programme_id' => '4', 'name' => 'Game Engine Architecture'],
            ['programme_id' => '4', 'name' => 'Artificial Intelligence for Games'],
            ['programme_id' => '4', 'name' => 'Physics Simulation'],
            ['programme_id' => '4', 'name' => 'Elective 3'],
            ['programme_id' => '4', 'name' => 'Individual Project 2'],
            ['programme_id' => '4', 'name' => 'Social and Current issues in Computing'],
            ['programme_id' => '4', 'name' => 'Advanced Games Studies'],
            ['programme_id' => '4', 'name' => 'Autonomous Mobile Robotics'],
            ['programme_id' => '4', 'name' => 'Tools for Making Games'],
            ['programme_id' => '4', 'name' => 'Industrial Training'],
        ]);

        $entries->map(function ($data) {
            $m = App\Module::create(['name' => $data['name']]);
            $m->programmes()->save(App\Programme::find($data['programme_id']));
        });
    }
}
