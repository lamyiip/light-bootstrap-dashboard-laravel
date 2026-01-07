<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\Candidate;
use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@snaprecruit.com',
            'password' => Hash::make('password'),
        ]);

        // Create recruiter user
        $recruiter = User::create([
            'name' => 'Recruiter Sarah',
            'email' => 'recruiter@snaprecruit.com',
            'password' => Hash::make('password'),
        ]);

        // Create 5 sample jobs
        $jobs = [
            [
                'title' => 'Senior Laravel Developer',
                'description' => 'We are seeking an experienced Laravel developer to join our growing team. You will be responsible for building scalable web applications and mentoring junior developers.',
                'department' => 'Engineering',
                'location' => 'Remote',
                'type' => 'full-time',
                'salary_min' => 120000,
                'salary_max' => 150000,
                'status' => 'published',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Frontend React Developer',
                'description' => 'Looking for a talented React developer with experience in modern JavaScript frameworks. You will work on building responsive user interfaces.',
                'department' => 'Engineering',
                'location' => 'New York, NY',
                'type' => 'full-time',
                'salary_min' => 100000,
                'salary_max' => 130000,
                'status' => 'published',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'UI/UX Designer',
                'description' => 'We need a creative UI/UX designer to help us create beautiful and intuitive user experiences. Experience with Figma is required.',
                'department' => 'Design',
                'location' => 'San Francisco, CA',
                'type' => 'full-time',
                'salary_min' => 90000,
                'salary_max' => 120000,
                'status' => 'published',
                'created_by' => $recruiter->id,
            ],
            [
                'title' => 'DevOps Engineer',
                'description' => 'Seeking a DevOps engineer to maintain our cloud infrastructure and CI/CD pipelines. AWS and Docker experience required.',
                'department' => 'Engineering',
                'location' => 'Remote',
                'type' => 'full-time',
                'salary_min' => 110000,
                'salary_max' => 140000,
                'status' => 'published',
                'created_by' => $admin->id,
            ],
            [
                'title' => 'Marketing Intern',
                'description' => 'Summer internship opportunity for a marketing student. Learn about digital marketing, content creation, and social media strategy.',
                'department' => 'Marketing',
                'location' => 'Austin, TX',
                'type' => 'internship',
                'salary_min' => null,
                'salary_max' => null,
                'status' => 'published',
                'created_by' => $recruiter->id,
            ],
        ];

        foreach ($jobs as $jobData) {
            Job::create($jobData);
        }

        // Create 10 sample candidates
        $candidates = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '+1-555-0101',
                'linkedin_url' => 'https://linkedin.com/in/johndoe',
                'skills' => ['Laravel', 'PHP', 'Vue.js', 'MySQL', 'Docker'],
                'culture_fit_score' => 85.5,
                'status' => 'active',
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '+1-555-0102',
                'linkedin_url' => 'https://linkedin.com/in/janesmith',
                'skills' => ['React', 'JavaScript', 'TypeScript', 'CSS', 'Node.js'],
                'culture_fit_score' => 92.0,
                'status' => 'active',
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'email' => 'michael.j@example.com',
                'phone' => '+1-555-0103',
                'linkedin_url' => 'https://linkedin.com/in/michaeljohnson',
                'skills' => ['Figma', 'Adobe XD', 'Sketch', 'Prototyping', 'UI Design'],
                'culture_fit_score' => 78.5,
                'status' => 'active',
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Brown',
                'email' => 'emily.brown@example.com',
                'phone' => '+1-555-0104',
                'linkedin_url' => 'https://linkedin.com/in/emilybrown',
                'skills' => ['AWS', 'Docker', 'Kubernetes', 'Terraform', 'CI/CD'],
                'culture_fit_score' => 88.0,
                'status' => 'active',
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Lee',
                'email' => 'david.lee@example.com',
                'phone' => '+1-555-0105',
                'skills' => ['Digital Marketing', 'SEO', 'Content Writing', 'Social Media'],
                'culture_fit_score' => 72.0,
                'status' => 'active',
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Wilson',
                'email' => 'sarah.w@example.com',
                'phone' => '+1-555-0106',
                'skills' => ['Python', 'Django', 'PostgreSQL', 'Redis', 'AWS'],
                'culture_fit_score' => 81.5,
                'status' => 'active',
            ],
            [
                'first_name' => 'Chris',
                'last_name' => 'Martinez',
                'email' => 'chris.m@example.com',
                'phone' => '+1-555-0107',
                'skills' => ['Vue.js', 'Nuxt.js', 'TailwindCSS', 'Laravel', 'API Design'],
                'culture_fit_score' => 86.0,
                'status' => 'active',
            ],
            [
                'first_name' => 'Amanda',
                'last_name' => 'Garcia',
                'email' => 'amanda.g@example.com',
                'phone' => '+1-555-0108',
                'skills' => ['UX Research', 'User Testing', 'Wireframing', 'Figma'],
                'culture_fit_score' => 79.5,
                'status' => 'active',
            ],
            [
                'first_name' => 'Ryan',
                'last_name' => 'Taylor',
                'email' => 'ryan.t@example.com',
                'phone' => '+1-555-0109',
                'skills' => ['Jenkins', 'GitLab CI', 'Ansible', 'Linux', 'Monitoring'],
                'culture_fit_score' => 83.0,
                'status' => 'active',
            ],
            [
                'first_name' => 'Lisa',
                'last_name' => 'Anderson',
                'email' => 'lisa.a@example.com',
                'phone' => '+1-555-0110',
                'skills' => ['Project Management', 'Agile', 'Scrum', 'JIRA', 'Communication'],
                'culture_fit_score' => 90.0,
                'status' => 'active',
            ],
        ];

        $createdCandidates = [];
        foreach ($candidates as $candidateData) {
            $createdCandidates[] = Candidate::create($candidateData);
        }

        // Create applications
        $allJobs = Job::all();
        $stages = ['applied', 'screening', 'phone_interview', 'technical_interview', 'hr_interview', 'offer'];

        // John Doe applies to Senior Laravel Developer - at phone interview stage
        Application::create([
            'job_id' => $allJobs[0]->id,
            'candidate_id' => $createdCandidates[0]->id,
            'stage' => 'phone_interview',
            'stage_order' => 0,
            'assigned_to' => $recruiter->id,
        ]);

        // Jane Smith applies to Frontend React Developer - at offer stage
        Application::create([
            'job_id' => $allJobs[1]->id,
            'candidate_id' => $createdCandidates[1]->id,
            'stage' => 'offer',
            'stage_order' => 0,
            'assigned_to' => $admin->id,
        ]);

        // Michael Johnson applies to UI/UX Designer - just applied
        Application::create([
            'job_id' => $allJobs[2]->id,
            'candidate_id' => $createdCandidates[2]->id,
            'stage' => 'applied',
            'stage_order' => 0,
            'assigned_to' => $recruiter->id,
        ]);

        // Emily Brown applies to DevOps Engineer - at screening
        Application::create([
            'job_id' => $allJobs[3]->id,
            'candidate_id' => $createdCandidates[3]->id,
            'stage' => 'screening',
            'stage_order' => 0,
            'assigned_to' => $admin->id,
        ]);

        // David Lee applies to Marketing Intern - at hr interview
        Application::create([
            'job_id' => $allJobs[4]->id,
            'candidate_id' => $createdCandidates[4]->id,
            'stage' => 'hr_interview',
            'stage_order' => 0,
            'assigned_to' => $recruiter->id,
        ]);

        // Sarah Wilson also applies to Senior Laravel Developer
        Application::create([
            'job_id' => $allJobs[0]->id,
            'candidate_id' => $createdCandidates[5]->id,
            'stage' => 'technical_interview',
            'stage_order' => 1,
            'assigned_to' => $admin->id,
        ]);

        // Chris Martinez applies to Frontend React Developer
        Application::create([
            'job_id' => $allJobs[1]->id,
            'candidate_id' => $createdCandidates[6]->id,
            'stage' => 'screening',
            'stage_order' => 1,
            'assigned_to' => $recruiter->id,
        ]);

        // Amanda Garcia applies to UI/UX Designer
        Application::create([
            'job_id' => $allJobs[2]->id,
            'candidate_id' => $createdCandidates[7]->id,
            'stage' => 'applied',
            'stage_order' => 1,
            'assigned_to' => $recruiter->id,
        ]);

        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin: admin@snaprecruit.com / password');
        $this->command->info('Recruiter: recruiter@snaprecruit.com / password');
    }
}
