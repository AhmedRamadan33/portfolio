<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $password = Str::random(12);

        User::updateOrCreate(
            ['email' => 'ahmed.ramadan.abdelaaty5@gmail.com'],
            ['name' => 'Ahmed Ramadan', 'password' => $password]
        );

        $this->command->warn("Admin login -> email: ahmed.ramadan.abdelaaty5@gmail.com | password: {$password}");

        Profile::updateOrCreate(['id' => 1], [
            'name' => 'Ahmed Ramadan',
            'title' => 'Senior Full Stack Developer',
            'tagline' => 'Building scalable, secure, and high-performance web applications.',
            'bio' => "Full Stack Developer with 4 years of experience specializing in Laravel, PHP, and MySQL, with a proven track record of building scalable, secure, and high-performance web applications. Experienced in designing and developing RESTful APIs, integrating third-party services, optimizing database performance, and implementing secure authentication, authorization, and Role-Based Access Control (RBAC). Strong foundation in MVC architecture, Object-Oriented Programming (OOP), and software design principles, with hands-on experience in real-time applications using Pusher and Livewire. Passionate about writing clean, maintainable code, solving complex technical challenges, and delivering reliable, production-ready backend solutions.",
            'email' => 'ahmed.ramadan.abdelaaty5@gmail.com',
            'phone' => '+20 150 561 1560',
            'location' => 'Zagazig, Egypt',
            'github_url' => 'https://github.com/AhmedRamadan33?tab=repositories',
            'linkedin_url' => 'https://www.linkedin.com/in/ahmed-ramadan-9565011a2/',
            'whatsapp_url' => 'https://wa.me/+201505611560',
        ]);

        $skills = [
            ['name' => 'PHP', 'category' => 'backend', 'level' => 100],
            ['name' => 'Laravel', 'category' => 'backend', 'level' => 100],
            ['name' => 'MySQL', 'category' => 'database', 'level' => 100],
            ['name' => 'REST APIs', 'category' => 'backend', 'level' => 100],
            ['name' => 'JavaScript', 'category' => 'frontend', 'level' => 95],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'level' => 95],
            ['name' => 'Bootstrap', 'category' => 'frontend', 'level' => 60],
            ['name' => 'Git', 'category' => 'tools', 'level' => 95],
        ];
        foreach ($skills as $i => $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill + ['order' => $i]);
        }

        $projects = [
            [
                'title' => 'ERP System',
                'description' => 'Developed and maintained a large-scale Enterprise Resource Planning (ERP) solution supporting end-to-end business operations across finance, accounting, inventory, procurement, sales, CRM, HR, payroll, POS, and business analytics. Implemented financial workflows including invoicing, payments, expenses, journal entries, tax management, and financial reporting. Built inventory and supply chain modules covering warehouses, stock movements, purchasing, suppliers, product management, and order processing. Developed employee and customer management modules with configurable workflows and Role-Based Access Control (RBAC). Integrated third-party services including payment gateways, email notifications, and external business APIs.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/AhmedRamadan33/erp.codeverse',
                'live_url' => 'https://erp.codeversetechno.com/',
                'featured' => true,
                'order' => 0,
            ],
            [
                'title' => 'Edvora lms',
                'description' => 'Developed a full-featured e-learning platform with course management, enrollments, exams, certificates, progress tracking, and role-based access control. Integrated multiple payment gateways including Stripe, Paymob, PayTabs, PayPal, and Fawry. Integrated VdoCipher for secure video streaming and Zoom/Google Meet for live classes. Implemented notifications, student–instructor chat, activity logging, queues, scheduled jobs, and RESTful APIs. Designed maintainable backend architecture using Laravel Services, Eloquent ORM, MySQL, authentication, authorization, and validation.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/AhmedRamadan33/edvora-lms',
                'live_url' => 'https://edvora.codeversetechno.com/',
                'featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'TimeDoc EG – Clinic Management System',
                'description' => 'Built a comprehensive clinic management platform with bilingual Arabic/English support and role-based access control. Developed modules for patient management, appointments, visits, doctors, schedules, medical records, invoices/payments, diagnostic tests and results, and clinic administration. Designed service/repository-based business logic, role-specific dashboards, appointment scheduling and collision validation, and RESTful APIs using Laravel Sanctum. Added extensive feature testing covering core clinical and administrative workflows.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/AhmedRamadan33/timedoc-eg',
                'live_url' => 'https://timedoc-eg.codeversetechno.com',
                'featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'LexOffice – Legal Office Management System',
                'description' => 'Built a multi-branch legal management platform with role-based access control and Arabic/English localization. Developed modules for clients, cases, sessions, courts, tasks, invoices/payments, expenses, documents, notifications, and activity logging. Implemented a client portal and CMS for firm content management, along with branch-based data scoping, media management, and permission-based workflows.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST API', 'Bootstrap'],
                'github_url' => 'https://github.com/AhmedRamadan33/lexOffice',
                'live_url' => 'https://lexoffice.codeversetechno.com/',
                'featured' => true,
                'order' => 3,
            ],


        ];
        foreach ($projects as $project) {
            Project::updateOrCreate(['title' => $project['title']], $project);
        }

        $experiences = [

            [
                'company' => 'scheme code',
                'role' => 'Backend Developer',
                'description' => 'Developed and maintained ERP, accounting, and business management systems using Laravel and PHP. Built financial modules including invoicing, payments, expense tracking, reporting, and business workflow automation. Designed scalable RESTful APIs and optimized complex MySQL queries to improve system performance. Developed reusable backend components and integrated third-party services to support diverse business requirements. Participated in system architecture, database design, feature development, debugging, and performance optimization. Worked on multiple custom web applications across various industries while following clean code and Laravel best practices.',
                'location' => 'New El-Maadi, Cairo, Egypt',
                'start_date' => '2023-01-01',
                'end_date' => '2024-02-01',
                'is_current' => false,
                'order' => 0,
            ],

            [
                'company' => 'Anmka',
                'role' => 'Backend Developer',
                'description' => 'Developed and maintained Learning Management Systems (LMS) and education-focused platforms using Laravel. Built modules for course management, student enrollment, online assessments, attendance tracking, grading, and learning workflows. Designed and implemented RESTful APIs to support web and mobile educational applications. Integrated third-party services, including payment gateways, email notifications, and live communication features. Implemented secure authentication, authorization, and role-based access control for administrators, instructors, students, and parents. Optimized application performance and collaborated with frontend developers to deliver scalable and user-friendly educational solutions.',
                'location' => 'Heliopolis, Cairo, Egypt',
                'start_date' => '2024-02-01',
                'end_date' => '2025-12-01',
                'is_current' => false,
                'order' => 1,
            ],

            [
                'company' => 'SahelBooks®',
                'role' => 'Backend Developer',
                'description' => 'Develop and maintain enterprise-grade ERP solutions using Laravel, PHP, and MySQL. Design and implement scalable RESTful APIs for ERP modules consumed by web and mobile applications. Refactor legacy code into Service and Repository architectures, improving code maintainability and scalability. Integrate third-party services, including payment gateways, email services, and external APIs. Optimize database performance through query optimization, indexing, and caching techniques. Implement secure authentication, authorization, and Role-Based Access Control (RBAC) while collaborating with cross-functional teams to deliver production-ready features.',
                'location' => 'Nasr City, Cairo, Egypt',
                'start_date' => '2025-12-01',
                'end_date' => null,
                'is_current' => true,
                'order' => 2,
            ],

        ];

        foreach ($experiences as $experience) {

            Experience::updateOrCreate(
                [
                    'company' => $experience['company'],
                    'role' => $experience['role'],
                ],
                $experience
            );
        }

        Education::updateOrCreate(['institution' => 'Zagazig university'], [
            'degree' => "Bachelor's degree in computer science",
            'field' => 'Computer Science',
            'start_date' => '2019-10-01',
            'end_date' => '2023-06-01',
            'order' => 0,
        ]);
    }
}
