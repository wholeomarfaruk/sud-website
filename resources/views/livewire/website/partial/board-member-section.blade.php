  <section  class="board_of_members_sec section">
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
                          <img class="" src="{{ $member->image ?? file_path($member->image) }}" alt="">
                          <div class="text">

                              <h3>{{ $member->name }}</h3>
                              <p>{{ $member->designation }}</p>
                              <button type="button" wire:click="memberDetails({{ $member->id }})" class="seemore cursor-pointer">See More <i
                                      class="bx bx-chevrons-right bx-fade-right"></i></button>
                          </div>
                      </div>
                  @endforeach


              </div>
          </div>
          <div x-cloak x-data="{ open: @entangle('memberModalOpen') }" x-show="open" x-transition.opacity @click.self="open = false"
              @keydown.escape.window="open = false"
              class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
              <div x-transition class="w-full max-w-2xl rounded-2xl bg-white p-6 shadow-xl">
                  <div class="flex justify-between items-center">
                      <h2 class="text-lg font-semibold">Member Details</h2>
                      <button @click="open = false">✕</button>
                  </div>
                  @if ($selectedMember)


                  <div class="mt-4">
                      <div class="member-detail-box flex gap-6">
                          <div class="member-card">
                              <img src="{{ asset('assets/images/members/2.jpg') }}" class="object-cover rounded-sm"
                                  alt="">
                              <div class="text">
                                  <h3>{{ $selectedMember->name }}</h3>
                                  <p>{{ $selectedMember->designation }}</p>
                              </div>

                          </div>
                          <div>
                              <h4 class="text-md font-medium">{{ $selectedMember->name }} sir's words</h4>
                              <p class="text-sm text-gray-500">
                                    {!! nl2br(e($selectedMember->description)) !!}
                              </p>
                          </div>
                      </div>



                  </div>
                    @endif
              </div>
          </div>

      @endif
  </section>
