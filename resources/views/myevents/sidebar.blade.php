<div class="absolute flex flex-col top-100 left-100 w-14 hover:w-64 md:w-64 bg-grey-200 h-full text-black transition-all duration-300 border-none z-10 sidebar">
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
          <ul class="flex flex-col py-4 space-y-1">

            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">My Event</div>
              </div>
            </li>
            <li>
              <a href="{{ route('myevents.details', ['myevent' => $myevent, 'event' => $myevent, 'organizer' => $organizer]) }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-600  text-white-600 hover:text-white border-l-4 border-transparent hover:border-indigo-400 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ route('myevents.applicants', ['event' => $myevent,'myevent' => $myevent, 'organizer' => $organizer,'status' => 'WAITING']) }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-600 text-white-600 hover:text-white border-l-4 border-transparent hover:border-indigo-400 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Applicants</span>
              </a>
            </li>
            <li>
              <a href="{{ route('myevents.boards', ['myevent' => $myevent,'event' => $myevent, 'organizer' => $organizer]) }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-600 text-white-600 hover:text-white border-l-4 border-transparent hover:border-indigo-400 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 8.976C3 4.05476 4.05476 3 8.976 3H15.024C19.9452 3 21 4.05476 21 8.976V15.024C21 19.9452 19.9452 21 15.024 21H8.976C4.05476 21 3 19.9452 3 15.024V8.976Z" stroke="#323232" stroke-width="2"></path> <path d="M12 3V21" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3 10H12" stroke="#323232" stroke-width="2" stroke-linecap="round"></path> <path d="M12 14H21" stroke="#323232" stroke-width="2" stroke-linecap="round"></path> </g></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Event Board</span>
              </a>
            </li>
            <li>
              <a href="{{ route('myevents.certificate', ['myevent' => $myevent, 'event' => $myevent, 'organizer' => $organizer] ) }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-indigo-600 text-white-600 hover:text-white border-l-4 border-transparent hover:border-indigo-400 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-5 h-5" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 9.312C3 4.93757 3.93757 4 8.312 4H9.92963C10.5983 4 11.2228 4.3342 11.5937 4.8906L12.4063 6.1094C12.7772 6.6658 13.4017 7 14.0704 7C15.9647 7 17.8145 7 19.1258 7C20.1807 7 21.0128 7.82095 21.0029 8.8758C21.0013 9.05376 21 9.20638 21 9.312V14.688C21 19.0624 20.0624 20 15.688 20H8.312C3.93757 20 3 19.0624 3 14.688V9.312Z" stroke="#323232" stroke-width="2"></path> </g></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Certificate</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
