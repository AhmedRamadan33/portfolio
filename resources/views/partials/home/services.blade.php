@php
    $services = [
        [
            'title' => 'Backend Development',
            'description' => 'I build scalable RESTful APIs and backend systems with Laravel and PHP, following MVC architecture and clean code principles.',
        ],
        [
            'title' => 'Database Design',
            'description' => 'I design efficient database schemas and optimize complex MySQL queries for performance, with a focus on data integrity and scalability.',
        ],
        [
            'title' => 'System Integration',
            'description' => 'I integrate third-party services — payment gateways, notifications, real-time features — and implement secure authentication and RBAC.',
        ],
    ];
@endphp
<div class="reveal content grid md:grid-cols-2 max-xxl:px-4 xxl:px-2 py-10 md:py-15 lg:py-37.5" id="services">
    <div class="flex flex-col justify-between h-fit md:pe-8 lg:pe-35.75 max-md:text-center my-auto">
        <p class="section-title max-md:text-center">What I do?</p>
        <div class="mt-6 text-[14px]">
            <p class="text-xs sm:text-lg font-normal text-gray-400 mb-4">
                I specialize in building reliable, secure, and high-performance backend systems that power real products.
            </p>
            <p class="text-xs sm:text-lg font-normal text-gray-400">
                My approach combines solid architecture with practical, production-ready code.
            </p>
        </div>
        <a href="#contact" class="mt-5 md:mt-12.5 btn btn-primary text-white w-fit md:py-3 md:px-6 text-[12px] sm:text-[16px] font-semibold max-md:mx-auto max-md:mb-5">
            Say Hello!
        </a>
    </div>
    <div>
        @foreach ($services as $service)
            <div class="group p-4 xs:p-8 bg-white hover:shadow-xl h-auto shadow-gray-300 ease-out duration-500 rounded-lg my-6 flex relative overflow-hidden">
                <p class="bg-picto-primary absolute start-0 w-0 h-full group-hover:w-[5px] transition-all duration-300"></p>
                <div>
                    <p class="text-xl sm:text-2xl font-semibold text-gray-900 pb-4">{{ $service['title'] }}</p>
                    <p class="text-[13px] sm:text-[16px] font-normal text-gray-700">{{ $service['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
