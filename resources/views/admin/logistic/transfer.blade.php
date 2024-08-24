<x-layout>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Logistic Item Process</h3>
        <!-- Province -->
        <div class="app-content">
            <button
                class="btn btn-success rounded-3 shadow m-3"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdropAdd"
                data-bs-whatever="@mdo"
            >
                Add Item
            </button>
            <div class="container-fluid">
                <div class="row">
                    <div class="card mb-2 shadow rounded-4">
                        <div class="card-header">
                            <h4>Logistic Transfer Process</h4>
                        </div>
                        <div class="card-body rounded-4 pt-2">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session("success") }}
                            </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session("error") }}
                            </div>
                            @endif
                            <table
                                class="table table-striped table-bordered shadow mt-3 table-responsive"
                            >
                                <thead>
                                    <tr>
                                        <th style="width: 20px !important">
                                            #
                                        </th>
                                        <th>Photo</th>
                                        <th>Item</th>
                                        <th>Payment</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Process</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logistics as $row)
                                    <tr class="align-middle">
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($row->photo)
                                            <img
                                                src="{{asset('logisticItem/'.$row->photo)}}"
                                                alt=""
                                                class="rounded-3"
                                                style="height: 60px"
                                            />
                                            @else
                                            <img
                                                src="{{
                                                    asset('image/noimg.png')
                                                }}"
                                                alt=""
                                                class="rounded-3"
                                                style="height: 60px"
                                            />
                                            @endif
                                        </td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->payment_method}}</td>
                                        <td>{{$row->from_location}}</td>
                                        <td>{{$row->to_destination}}</td>
                                        @if($row->process=='Pending')
                                        <td class="text-warning">
                                            {{$row->process}}
                                        </td>
                                        @elseif($row->process=='Destination')
                                        <td class="text-success">
                                            {{$row->process}}
                                        </td>
                                        @else
                                        <td class="text-primary">
                                            {{$row->process}}
                                        </td>
                                        @endif
                                        <td>
                                            <button
                                                class="btn btn-primary rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#showModal-{{$row->id}}"
                                            >
                                                Show
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div
                                        class="modal fade"
                                        id="showModal-{{ $row->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editModalLabel-{{ $row->id }}"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form
                                                    action=""
                                                    method="POST"
                                                    enctype="multipart/form-data"
                                                >
                                                    @csrf @method('PUT')
                                                    <div class="modal-header">
                                                        <h5
                                                            class="modal-title"
                                                            id="editModalLabel-{{ $row->id }}"
                                                        >
                                                            កែប្រែព័តមាន
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        ></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label"
                                                                >ផលិតផល</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="name-{{ $row->id }}"
                                                                name="name"
                                                                value="{{ $row->name }}"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Close
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add -->
            <div
                class="modal fade"
                id="staticBackdropAdd"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
                data-bs-target="#staticBackdropAdd"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
            >
                <div class="modal-dialog modal-top-center modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Add New Provinces
                            </h1>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="{{ route('logistic.storeLogistic') }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Name:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="recipient-name"
                                            name="name"
                                            placeholder="#item"
                                        />
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Price:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="recipient-name"
                                            name="price"
                                            placeholder="$"
                                        />
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Item Price:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="recipient-name"
                                            name="item_price"
                                            placeholder="$"
                                        />
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Item Type:</label
                                        >
                                        <select
                                            name="item_type"
                                            id=""
                                            class="form-select"
                                        >
                                            @foreach($itemTypes as $itemType)
                                            <option value="{{$itemType->id}}">
                                                {{$itemType->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Payment Method:</label
                                        >
                                        <select
                                            name="payment_method"
                                            id=""
                                            class="form-select"
                                        >
                                            <option value="local">
                                                Pay from This
                                            </option>
                                            <option value="destination">
                                                Pay at Destination
                                            </option>
                                        </select>
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Description:</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="recipient-name"
                                            name="description"
                                            placeholder="#optional"
                                        />
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >From Location:</label
                                        >
                                        <select
                                            name="from_location"
                                            id=""
                                            class="form-select"
                                        >
                                            @foreach($provinces as $province)
                                            <option value="{{$province->id}}">
                                                {{$province->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >To Destination:</label
                                        >
                                        <select
                                            name="to_destination"
                                            id=""
                                            class="form-select"
                                        >
                                            @foreach($provinces as $province)
                                            <option value="{{$province->id}}">
                                                {{$province->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex flex-row gap-3">
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Process:</label
                                        >
                                        <select
                                            name="process"
                                            id=""
                                            class="form-select"
                                        >
                                            @foreach($processes as $process)
                                            <option value="{{$process->id}}">
                                                {{$process->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-100">
                                        <label
                                            for="recipient-name"
                                            class="col-form-label"
                                            >Photo:</label
                                        >
                                        <input
                                            type="file"
                                            name="photo"
                                            class="form-control"
                                            id="imgInput"
                                            accept="image/*"
                                        />
                                    </div>
                                </div>
                                <input
                                    type="submit"
                                    name="submit"
                                    value="Add Logistic Item"
                                    class="btn btn-success"
                                />
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
