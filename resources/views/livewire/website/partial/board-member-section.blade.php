  <section class="board_of_members_sec section">
      @if ($members->count() > 0)


          <div class="wrapper">
              <div class="section-header">
                  <h2 class="">Board of Members</h2>
                  <p class="text-gray-600">Meet the visionary leaders and industry experts who guide our company towards
                      excellence and innovation in real estate development.</p>
              </div>
              <div class="grid-box">
                  @foreach ($members as $member)
                      <div class="member-card">
                          <img class="" src="{{ $member->image ? file_path($member->image) : '' }}" alt="">
                          <div class="text">

                              <h3>{{ $member->name }}</h3>
                              <p>{{ $member->designation }}</p>
                              <button type="button" wire:click="memberDetails({{ $member->id }})"
                                  class="seemore cursor-pointer">See More <i
                                      class="bx bx-chevrons-right bx-fade-right"></i></button>
                          </div>
                      </div>
                  @endforeach


              </div>
          </div>
          <div x-cloak x-data="{ open: @entangle('memberModalOpen') }" x-show="open" x-transition.opacity @click.self="open = false"
              @keydown.escape.window="open = false"
              class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
              <div x-transition class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl overflow-hidden">

                  {{-- Modal Header --}}
                  <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                      <span class="text-xs font-semibold uppercase tracking-widest text-green-700">Board Member</span>
                      <button @click="open = false"
                          class="w-8 h-8 flex items-center justify-center rounded-full text-gray-400 hover:bg-gray-100 hover:text-gray-700 transition cursor-pointer text-lg leading-none">
                          ✕
                      </button>
                  </div>

                  @if ($selectedMember)
                      {{-- Body: stacked on mobile, side-by-side on sm+ --}}
                      <div class="flex flex-col sm:flex-row">

                          {{-- Left: photo + name --}}
                          <div class="sm:w-52 shrink-0 flex flex-col items-center justify-start bg-gray-50 px-6 py-8 gap-3">
                              <div class="w-28 h-28 sm:w-36 sm:h-36 rounded-full overflow-hidden ring-4 ring-white shadow-md">
                                  <img src="{{ $selectedMember->image ? file_path($selectedMember->image) : '' }}"
                                      class="w-full h-full object-cover"
                                      alt="{{ $selectedMember->name }}">
                              </div>
                              <div class="text-center">
                                  <h3 class="text-base font-bold text-gray-900 leading-tight">{{ $selectedMember->name }}</h3>
                                  <p class="text-xs text-green-700 font-medium mt-1">{{ $selectedMember->designation }}</p>
                              </div>
                          </div>

                          {{-- Right: message --}}
                          <div class="flex-1 px-6 py-8 flex flex-col justify-center">
                              <div class="flex items-center gap-2 mb-3">
                                  <svg class="w-5 h-5 text-green-700 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                      <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                  </svg>
                                  <h4 class="text-sm font-semibold text-gray-800">Message</h4>
                              </div>
                              <p class="text-sm text-gray-500 leading-relaxed">
                                  @if($selectedMember->description)
                                      {!! nl2br(e($selectedMember->description)) !!}
                                  @else
                                      <span class="italic text-gray-400">No message available.</span>
                                  @endif
                              </p>
                          </div>

                      </div>
                  @endif
              </div>
          </div>

      @endif
  </section>
