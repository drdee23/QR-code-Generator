<x-app-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('dashboard') }}">Dashboard </a>
        </li>

        <li class="breadcrumb-item text-sm">events
        </li>

    </x-slot>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h6">events</h1>
            <p class="mb-0">List of events you own and create Events under.</p>
        </div>
        {{-- <div><a href="#addevent" class="btn btn btn-gray-800 d-inline-flex align-items-center"><svg
                    class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg> Add event</a></div> --}}

    </div>
    <div class="py-4"></div>
    <div class="card border-0">
        <div class="card-body">

            <div id="addevent">
                <form method="POST" enctype="multipart/form-data" action="{{ route('qr.generate') }}">
                    @method('POST')
                    @csrf
                    <div class="row shadow">
                        <div class="col-md-6 mb-3">
                            <div><label for="name">Name Of The event</label>
                                <input class="form-control" name="title" id="title" type="text"
                                    value="{{ $event->title }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3"><label class="my-1 me-2" for="organisation_id">Organisation</label>
                            <select class="form-select" value="{{ $event->organisation_id }}" id="organisation_id"
                                name="organisation_id" aria-label="Default select example">
                                <option value="{{ $event->organisation_id }}">{{ $event->organisation->name }}</option>
                                @foreach ($organisations as $organisation)
                                    <option value="{{ $organisation->id }}">{{ $organisation->name }}</option>
                                @endforeach
                            </select></div>

                        <div class="col-md-4 mb-3">
                            <div><label for="number_of_qrs">Number Of Codes Needed</label> <input class="form-control"
                                    id="number_of_qrs" type="number" value="{{ $event->number_of_qrs }}"
                                    name="number_of_qrs" required></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div>
                                <label for="color">start date and time</label>
                                <input class="form-control" id="color" value="{{ $event->start_date }}"
                                    name="start_date" type="datetime-local" required>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div>
                                <label for="color">end date and time</label>
                                <input class="form-control" id="color" value="{{ $event->end_date }}"
                                    name="end_date" type="datetime-local" required>
                            </div>
                        </div>


                        <div class="col-md-12 mb-3">
                            <div>
                                <label for="color">Brief Details about the event</label>
                                <textarea class="form-control" id="color" name="description" required>{{ $event->description }}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <div class="col-md-4 mb-3"><button type="submit"
                                class="btn btn btn-gray-800 d-inline-flex align-items-center"><svg
                                    class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                    </path>
                                </svg> Generate codes for the event</button></div>
                    </div>
                </form>

            </div>
        </div>
    </div>



    {{-- /////////////LIST/////////////// --}}
    @if (count($qr_codes) > 0)
        <div class="py-4"></div>
        <div class="card">
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>logo</th>
                            <th>Name</th>
                            <th>start date</th>
                            <th>End date</th>
                            <th>Codes</th>
                            <th>Personel</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="#" class="d-flex align-items-center"><img
                                            src="{{ $event->organisation->logo }}" class="avatar rounded-circle me-3"
                                            alt="Avatar">

                                    </a></td>
                                <td>
                                    <div class="d-block"><span class="fw-bold">{{ $event->title }}</span>
                                        <div class="small text-gray"><span class="__cf_email__"
                                                data-cfemail="c4adaaa2ab84a1bca5a9b4a8a1eaa7aba9">Admin email:
                                                {{ $event->organisation->admin->person->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="fw-normal">{{ $event->start_date }}</span></td>
                                <td><span class="fw-normal">{{ $event->end_date }}</span>
                                </td>

                                <td><span class="fw-normal">{{ $event->number_of_qrs }}</span></td>
                                <td><span class="fw-normal">{{ count($event->event_personel) }}</span>
                                </td>
                                {{-- <td><span class="fw-normal d-flex align-items-center"><svg
                                            class="icon icon-xxs text-danger me-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg> Email</span></td> --}}
                                @if ($event->status == 'active')
                                    <td><span class="fw-normal text-success">Active</span></td>
                                @else
                                    <td><span class="fw-normal text-success">Inactive</span></td>
                                @endif


                                <td>
                                    <div class="btn-group"><button
                                            class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                                class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                                </path>
                                            </svg> <span class="visually-hidden">Toggle Dropdown</span></button>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                            <a class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg> View Details </a>

                                            <a class="dropdown-item d-flex align-items-center" href="#"><svg
                                                    class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Edit</a>


                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <svg class="icon icon-xs text-danger ms-1" title="Delete"
                                                    data-bs-toggle="tooltip" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @endif


</x-app-layout>
