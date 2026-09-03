@php
    $addressData = array_filter([
        $profile?->location ? ['title' => 'Address', 'description' => $profile->location, 'icon' => 'location'] : null,
        $profile?->email ? ['title' => 'My Email', 'description' => $profile->email, 'icon' => 'envelope'] : null,
        $profile?->phone ? ['title' => 'Call Me Now', 'description' => $profile->phone, 'icon' => 'phone'] : null,
    ]);
@endphp
<div class="reveal relative -bottom-15 -mt-15 z-10 px-2">
    <div class="content p-4 md:p-10 lg:p-22 bg-white rounded-2xl shadow-[0px_0px_90px_9px_rgba(0,_0,_0,_0.1)]" id="contact">
        <div class="flex flex-col-reverse lg:gap-5 xl:gap-25.75 lg:flex-row justify-between">
            <div>
                <div>
                    <p class="text-[35px] max-lg:hidden font-semibold text-nowrap text-[#132238]">Let's discuss your Project</p>
                    <p class="text-[12px] xs:text-[14px] sm:text-lg md:text-lg max-lg:text-center pt-4 font-normal text-soft-dark">
                        I'm available for freelance and full-time backend work. Drop me a line if you have a project you think I'd be a good fit for.
                    </p>
                </div>
                @if (count($addressData))
                    <div class="my-8.75 sm:max-lg:flex justify-between items-center">
                        @foreach ($addressData as $item)
                            <div class="group max-w-84 p-3 md:p-3.75 lg:p-6 flex xs:not-odd:my-3 rounded-[10px] bg-white duration-450 cursor-pointer hover:shadow-[0px_0px_37px_5px_rgba(0,_0,_0,_0.1)] shadow-gray-200 max-sm:mx-auto">
                                <div class="h-10 md:h-12 aspect-square bg-[#EDD8FF80] group-hover:bg-picto-primary center rounded-[4px] transition-colors duration-300 shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 text-picto-primary group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        @switch($item['icon'])
                                            @case('location')
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/>
                                                @break
                                            @case('envelope')
                                                <rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>
                                                @break
                                            @case('phone')
                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92Z"/>
                                        @endswitch
                                    </svg>
                                </div>
                                <div class="ms-3.25 min-w-0 flex-1">
                                    <p class="text-[12px] md:text-[14px] text-[#424E60] font-normal">{{ $item['title'] }}:</p>
                                    <p class="text-[14px] md:text-[16px] text-[#132238] font-medium break-words">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="w-full overflow-y-scroll py-6.5">
                <p class="text-xl mb-2 xs:text-2xl sm:text-2xl md:text-[38px] font-semibold text-[#132238] lg:hidden text-center">
                    Let's discuss your Project
                </p>

                @if (session('contact_success'))
                    <p class="mb-4 rounded-lg border border-emerald-300 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('contact_success') }}
                    </p>
                @endif

                <p class="text-[12px] xs:text-[14px] max-lg:text-center sm:text-lg font-normal text-soft-dark">
                    I'm always open to discussing backend work or partnership opportunities.
                </p>
                <div class="mx-2">
                    <form method="POST" action="{{ route('contact.store') }}" class="flex flex-col gap-4 mt-4">
                        @csrf
                        <div>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name*"
                                class="input input-lg border-0 border-b-2 focus:outline-none focus:placeholder:text-picto-primary placeholder:text-[15px] md:placeholder:text-lg focus:border-picto-primary border-[#E6E8EB] w-full rounded-none px-0">
                            @error('name')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email*"
                                class="input input-lg border-0 border-b-2 focus:outline-none focus:placeholder:text-picto-primary placeholder:text-[15px] md:placeholder:text-lg focus:border-picto-primary border-[#E6E8EB] w-full rounded-none px-0">
                            @error('email')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject"
                                class="input input-lg border-0 border-b-2 focus:outline-none focus:placeholder:text-picto-primary placeholder:text-[15px] md:placeholder:text-lg focus:border-picto-primary border-[#E6E8EB] w-full rounded-none px-0">
                            @error('subject')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <textarea name="message" rows="3" placeholder="Message*"
                                class="textarea textarea-lg border-0 border-b-2 focus:outline-none focus:placeholder:text-picto-primary placeholder:text-[15px] md:placeholder:text-lg focus:border-picto-primary border-[#E6E8EB] w-full rounded-none px-0">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-1 text-xs text-rose-500">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="btn gap-3 max-lg:mx-auto btn-primary rounded-sm mt-5 text-[13px] md:text-[16px] w-fit font-semibold lg:mt-12.5 p-2 md:px-4">
                            Submit
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 md:w-5 aspect-square" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
